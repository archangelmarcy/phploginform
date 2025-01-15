<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/vendor/autoload.php';
require_once('class/User.php');

session_start(); 
use Steampixel\Route;
use Smarty\Smarty;

//smarty
$s = new Smarty();
$s->setTemplateDir('templates');
$s->setCompileDir('templates_c');
$s->setCacheDir('cache');
$s->setConfigDir('configs');

Route::add('/', function() {
    //sprawdzamy czy użytkownik jest zalogowany
    global $s;
    $isUserLogged = isset($_SESSION['user']);
    //przekazujemy do smarty informację czy użytkownik jest zalogowany
    if($isUserLogged){
        $s->assign('isUserLogged', true);
        $s->assign('user', $_SESSION['user']->getEmail());
    } //jeśli nie jest zalogowany to przekazujemy informację, że nie jest zalogowany
    else {
        $s->assign('isUserLogged', false);
    }
    //wyświetlamy stronę główną
    $s->display('index.tpl');
});

Route::add('/login', function() {
    global $s;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['emailInput'];
        $password = $_POST['passwordInput'];
        $user = new User($email, $password);
        $user->registerSession();
        $s->assign('formSubmitted', true);
        $s->assign('userEmail', $email);
    } else {
        $s->assign('formSubmitted', false);
    }
    $s->display('login.tpl');
}, ['get', 'post']);

Route::add('/register', function() {
    global $s;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['emailInput'];
        $password = $_POST['passwordInput'];
        User::register($email, $password);
        $s->assign('formSubmitted', true);
    } else {
        $s->assign('formSubmitted', false);
    }
    $s->display('register.tpl');
}, ['get', 'post']);

Route::add('/logout', function() {
    global $s;
    $isUserLogged = isset($_SESSION['user']);
    if($isUserLogged){
        session_destroy();
        $s->assign('message', 'Zostałeś wylogowany');
    }
    $s->display('logout.tpl');
});

Route::run('/phploginform');
?>