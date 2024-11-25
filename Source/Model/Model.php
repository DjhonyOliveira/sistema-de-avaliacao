<?php

namespace Source\Model;

use Source\Core\Connect;

/**
 * @author Djonatan R de Oliveira
 * @package Source\Models
 */
abstract class Model
{
    /** @var object|null */
    protected $data;

    /** @var \PDOException|null */
    protected $fail;

    /** @var string */
    protected $query;

    /** @var array */
    protected $params;

    /** @var string */
    protected $order;

    /** @var int */
    protected $limit;

    /** @var int */
    protected $offset;

    /** @var string $entity database table */
    protected static $entity;

    /** @var array $protected no update or create */
    protected static $protected;

    /** @var array $entity database table */
    protected static $required;

    /**
     * Model constructor.
     * @param string $entity database table name
     * @param array $protected table protected columns
     * @param array $required table required columns
     */
    public function __construct(string $entity, array $protected, array $required)
    {
        self::$entity    = $entity;
        self::$protected = $protected;
        self::$required  = $required;
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        if (empty($this->data)) {
            $this->data = new \stdClass();
        }

        $this->data->$name = $value;
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data->$name);
    }

    /**
     * @param $name
     * @return null
     */
    public function __get($name)
    {
        return ($this->data->$name ?? null);
    }

    /**
     * @return null|object
     */
    public function data(): ?object
    {
        return $this->data;
    }

    /**
     * @return \PDOException
     */
    public function fail(): ?\PDOException
    {
        return $this->fail;
    }

    /**
     * @param string|null $terms
     * @param string|null $params
     * @param string|null $coluns
     * @return Model|mixed
     */
    public function find(?string $terms = null, ?string $params = null, ?string $coluns = '*')
    {
        if ($terms) {
            $this->query = "Select {$coluns} from " . self::$entity . " where {$terms}";
            parse_str($params, $this->params);
            return $this;
        }

        $this->query = "Select {$coluns} from " . self::$entity;
        return $this;
    }

    /**
     * @param int $id
     * @param string $columns
     * @return null|mixed|Model
     */
    public function findById(string $chave, int $id, string $columns = "*", bool $fetchAll = false): null|array|Model
    {
        $find = $this->find("{$chave}=:{$chave}", "{$chave}={$id}", $columns);

        return $find->fetch($fetchAll);
    }

    /**
     * @param bool $all
     * @return null|array|mixed|Model
     */
    public function fetch(bool $all = false)
    {
        try{
            $stmt = Connect::getInstance()->prepare($this->query . $this->order . $this->limit . $this->offset);
            $stmt->execute($this->params);

            if (!$stmt->rowCount()) {
                return null;
            }

            if ($all) {
                return $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
            }

            return $stmt->fetchObject(static::class);

        } catch (\PDOException $exeption) {
            $this->fail = $exeption;
            return null;
        }
    }

    public function count(): int
    {
        $stmt = Connect::getInstance()->prepare($this->query);
        $stmt->execute($this->params);

        return $stmt->rowCount();
    }

    /**
     * @param array $data
     * @return int|null
     */
    protected function create(array $data): ?int
    {
        try {
            $columns = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));

            $stmt = Connect::getInstance()->prepare("INSERT INTO " . static::$entity . " ({$columns}) VALUES ({$values})");
            $stmt->execute($this->filter($data));

            return Connect::getInstance()->lastInsertId();
        } catch (\PDOException $exception) {
            $this->fail = $exception;
            return null;
        }
    }

    /**
     * @param string $key
     * @param string $value
     * @return boolean
     */
    public function delete(string $key, string $value): bool
    {
        try {
            $stmt = Connect::getInstance()->prepare("DELETE FROM " . static::$entity . " WHERE {$key} = :key");
            $stmt->bindValue("key", $value, \PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (\PDOException $exception) {
            $this->fail = $exception;
            return false;
        }
    }

    /**
     * @return array|null
     */
    protected function safe(): ?array
    {
        $safe = (array) $this->data;
        foreach (static::$protected as $unset) {
            unset($safe[$unset]);
        }
        return $safe;
    }

    /**
     * @param array $data
     * @return array|null
     */
    private function filter(array $data): ?array
    {
        $filter = [];
        foreach ($data as $key => $value) {
            $filter[$key] = (is_null($value) ? null : filter_var($value, FILTER_DEFAULT));
        }
        return $filter;
    }

    /**
     * @return bool
     */
    protected function required(): bool
    {
        $data = (array) $this->data();
        foreach (static::$required as $field) {
            if (empty($data[$field])) {
                return false;
            }
        }
        return true;
    }
}