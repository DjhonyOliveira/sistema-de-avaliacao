<?php

/** 
 * Banco de dados 
 */
define("CONF_DB_HOST", "localhost");
define("CONF_DB_NAME", "avaliacao");
define("CONF_DB_PASS", "djonatan");
define("CONF_DB_PORT", "5432");
define("CONF_DB_USER", "postgres");

/** 
 * Urls 
 */
define("CONF_URL_TEST","http://localhost/app");
define("CONF_URL_BASE","https://meudominio.com.br");


/** 
 * View 
 */
define("CONF_VIEW_PATH", __DIR__ . "/../View");
define("CONF_VIEW_EXT", "php");

/**
 * Senhas
 */
define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);

/**
 * Message
 */
define("CONF_MESSAGE_CLASS", "message");
define("CONF_MESSAGE_INFO", "info icon-info");
define("CONF_MESSAGE_SUCCESS", "success icon-check-square-o");
define("CONF_MESSAGE_WARNING", "warning icon-warning");
define("CONF_MESSAGE_ERROR", "error icon-warning");
