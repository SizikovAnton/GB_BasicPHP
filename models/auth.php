<?php

if(isset($_POST['send'])) {
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    if(!auth($login, $pass)) {
        die('Неверный логин или пароль');
    } else {
        if(isset($_POST['save'])) {
            $hash = uniqid(rand(), true);
            $id = (int)$_SESSION['id'];
            executeQuery("UPDATE users SET hash = '{$hash}' WHERE id = {$id}");
            setcookie("hash", $hash, time() + 36000, '/');
        }
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
}

function getUser() {
    return $_SESSION['login'];
}

function isAuth() {
    if(isset($_COOKIE['hash']) && !isset($_SESSION['login'])) {
        $hash = $_COOKIE['hash'];
        $user = getAssocResult("SELECT * FROM users WHERE hash='{$hash}'")[0]['login'];
        if(!empty($user)) {
            $_SESSION['login'] = $user;
        }
    }
    return isset($_SESSION['login']);
}

function auth($login, $pass) {
    $login = mysqli_real_escape_string(getDb(), strip_tags(stripcslashes($login)));
    $userDb = getAssocResult("SELECT * FROM users WHERE login='{$login}'")[0];
    if(password_verify($pass, $userDb['pass'])) {
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $userDb['id'];
        return true;
    }
    return false;
}

function logout() {
    session_destroy();
    setcookie("hash", "", time() - 3600, '/');
    header("Location: /");
}

function isAdmin() {
    return getUser() === 'admin'; //Можно сделать проверку не по имени, а добавить в БД поле с ролью пользователя. Так же можно добавить проверку по хэшу.
}