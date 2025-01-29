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
    global $s;
    $isUserLogged = isset($_SESSION['user']);
    if($isUserLogged){
        header('Location: /phploginform/profile');
        exit();
    } else {
        $s->assign('isUserLogged', false);
        $s->display('index.tpl');
    }
});

Route::add('/login', function() {
    global $s;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['emailInput'];
        $password = $_POST['passwordInput'];
        $user = new User($email, $password);
        if ($user->login()) {
            $user->registerSession();
            header('Location: /phploginform/profile');
            exit();
        } else {
            $s->assign('formSubmitted', true);
            $s->assign('loginError', 'Nieprawidłowy email lub hasło');
        }
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

Route::add('/profile', function() {
    global $s;
    $isUserLogged = isset($_SESSION['user']);
    if($isUserLogged){
        $s->assign('user', $_SESSION['user']);
        $s->assign('isUserLogged', true);
        $s->display('profile.tpl');
    } else {
        header('Location: /phploginform/login');
        exit();
    }
});

Route::add('/saveProfile', function() {
    global $s;
    $isUserLogged = isset($_SESSION['user']);
    if($isUserLogged && $_SERVER['REQUEST_METHOD'] === 'POST') {
        // Tutaj dodaj kod do zapisywania danych profilu
        // Na przykład:
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $birthDate = $_POST['birthDate'];
        $profilePicture = $_FILES['profilePicture']['name'];

        // Zaktualizuj dane użytkownika w bazie danych
        // ...

        // Przekieruj z powrotem na stronę profilu
        header('Location: /phploginform/profile');
        exit();
    } else {
        header('Location: /phploginform/login');
        exit();
    }
}, ['post']);

Route::add('/changePassword', function() {
    global $s;
    $isUserLogged = isset($_SESSION['user']);
    if($isUserLogged && $_SERVER['REQUEST_METHOD'] === 'POST') {
        // Tutaj dodaj kod do zmiany hasła
        // Na przykład:
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        if ($newPassword === $confirmPassword) {
            // Zaktualizuj hasło użytkownika w bazie danych
            // ...
        }

        // Przekieruj z powrotem na stronę profilu
        header('Location: /phploginform/profile');
        exit();
    } else {
        header('Location: /phploginform/login');
        exit();
    }
}, ['post']);

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