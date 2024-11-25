<?php

/**
 * Validador de URL
 * @param string $path
 * @return string
 */
function url(string $path = null): string
{
    if (!strpos($_SERVER['HTTP_HOST'], "localhost")){
       if ($path){
           return CONF_URL_TEST . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
       }
        return CONF_URL_TEST;
    }

    if ($path){
        return CONF_URL_BASE . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }


    return CONF_URL_BASE;
}

/**
 * Checa se o valor repassado como parametro possui alguma informação
 * @param mixed $xValue
 * @return bool
 */
function emBranco(string $xValue): bool
{
    if($xValue == ''){
        return true;
    }

    return false;
}

/**
 * Verifica se é um email
 * @param string $email
 * @return bool
 */
function is_email(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * Verifica senha
 * @param string $password
 * @return bool
 */
function is_passwd(string $password): bool
{
    if (password_get_info($password)['algo'] || mb_strlen($password) >= CONF_PASSWD_MIN_LEN && mb_strlen($password) <= CONF_PASSWD_MAX_LEN) {
        return true;
    }

    return false;
}

/**
 * Regera Hash
 * @param string $hash
 * @return bool
 */
function passwd_rehash(string $hash): bool
{
    return password_needs_rehash($hash, CONF_PASSWD_ALGO, CONF_PASSWD_OPTION);
}

/**
 * Gera a hash para senha de usuário
 * @param string $password
 * @return string
 */
function passwd(string $password): string
{
    if (!empty(password_get_info($password)["algo"])){
        return $password;
    }

    return password_hash($password, CONF_PASSWD_ALGO, CONF_PASSWD_OPTION);
}

/**
 * Verificador de senha
 * @param string $senhaInformada
 * @param string $senhaGravada
 * @return bool
 */
function passVerify(string $senhaInformada, string $senhaGravada)
{
    return password_verify($senhaInformada, $senhaGravada);
}

/**
 * Redireciona para a URL informada
 * @param string $url
 * @return void
 */
function redirect(string $url): void
{
    header("HTTP/1.1 302 Redirect");
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        header("Location: {$url}");
        exit;
    }

    $location = url($url);
    header("Location: $location");
    exit;
}

/**
 * Função auxiliar para montagem de uma tabela
 * @param array $aTitleColunas -- array com o nome das colunas
 * @param array $aDados        -- array com os dados (considerar array de linhas e dentro array de colunas)
 * @return void
 */
function montaTable(array $aTitleColunas, array $aDados, $sParametroAcao)
{
    $sTable = "<table class=\"table table-bordered table-striped table-hover\">";
    $sTable .= "<tr>";

    foreach($aTitleColunas as $nome){
        $sTable .= "<th>$nome</th>";
    }

    $sTable .= "<th>Ações</th>";
    $sTable .= "</tr>";

    foreach($aDados as $coluna){
        $id = $coluna[0];

        $sTable .= '<tr>';

        foreach($coluna as $key => $value){
            if ($key != 0) {
                $sTable .= '<td style="padding: 10px 15px;">' . $value . '</td>';
            }
        }

        $sTable .= '<td style="padding: 10px 15px; text-align: center; width: auto;">';
        $sTable .= '<div class="btn-group" role="group" aria-label="Ações">';
        $sTable .= '<button type="button" name="acao" value="excluir" data-id="'. $id .'" data-param="'. $sParametroAcao .'" class="btn btn-danger btn-sm excluir">Excluir</button>';
        $sTable .= '</div>';
        $sTable .= '</td>';

        $sTable .= '</tr>';
    }

    $sTable .= "</table>";

    echo $sTable;
}

