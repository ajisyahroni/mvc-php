<?php
// Matikan deprecated dan warning sejak awal
error_reporting(E_ALL & ~E_DEPRECATED & ~E_WARNING);
ini_set('display_errors', 1);

session_start(); // Start or Resume Session

require('config.php');

// Composer autoload libraries
require('vendor/autoload.php');

// Pengaturan error sesuai DEVELOPMENT_MODE
if (DEVELOPMENT_MODE == true) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_WARNING); 
} else {
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_WARNING);
    ini_set('log_errors', 'On');
    ini_set('error_log', 'error.log');
    ini_set('display_errors','Off');
}

// Set zona waktu default jika sudah diatur
if (!empty(DEFAULT_TIMEZONE)) {
    date_default_timezone_set(DEFAULT_TIMEZONE);
}

// Autoload: Model
function autoloadModel($className) {
    $filename = MODELS_DIR . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}

// Autoload: Controller
function autoloadController($className) {
    $filename = CONTROLLERS_DIR . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}

// Autoload: Library
function autoloadLibrary($className) {
    $filename = LIBS_DIR . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}

// Autoload: Helper
function autoloadHelper($className) {
    $filename = HELPERS_DIR . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}

// Register semua autoloaders
spl_autoload_register("autoloadModel");
spl_autoload_register("autoloadController");
spl_autoload_register("autoloadLibrary");
spl_autoload_register("autoloadHelper");

// Load fungsi-fungsi helper global
require(HELPERS_DIR . 'Functions.php');

// Inisialisasi kelas penting
$lang = new Lang;     // Untuk multi-bahasa
$csrf = new Csrf;     // Untuk keamanan form
$csrf_token = $csrf::$token;

// Load core system PHPRad
require(SYSTEM_DIR . 'BaseController.php');
require(SYSTEM_DIR . 'SecureController.php');
require(SYSTEM_DIR . 'BaseView.php');
require(SYSTEM_DIR . 'Router.php');

// Custom error page handler
function exception_handler($exception) {
    $view = new BaseView();
    $view->render("errors/error_server.php", $exception, "info_layout.php");
    exit;
}

// Daftarkan handler error
set_exception_handler('exception_handler');

// Jalankan aplikasi
$page = new Router;
$page->init(); // Bootstrap URL
	
	