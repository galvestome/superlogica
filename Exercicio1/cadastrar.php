<?php

require_once './Conexao.class.php';
require_once './Cadastro.class.php';

// Não podemos deixar um post vazio.
if (!isset( $_POST) || empty($_POST)) {
    echo 'POST está vazio.'; die;
}

// Não podemos deixar um post vazio.
if (!isset($_POST['name']) || empty($_POST['name'])) {
    echo 'Nome precisa ser preenchido'; die;
}

// Não podemos deixar um post vazio.
if (!isset($_POST['userName']) || empty($_POST['userName'])) {
    echo 'Username precisa ser preenchido'; die;
}

// Não podemos deixar um post vazio.
if (!isset($_POST['zipCode']) || empty($_POST['zipCode'])) {
    echo 'CEP precisa ser preenchido'; die;
} else {
    $cep = $_POST['zipCode'];

    if(!preg_match('/^[0-9]{5,5}([- ]?[0-9]{3,3})?$/', $cep)) {
        echo "CEP inválido."; die;
    }
}

// Não podemos deixar um post vazio.
if (!isset($_POST['email']) || empty($_POST['email'])) {
    echo 'Email precisa ser preenchido'; die;
} else {
    $email = $_POST['email'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "E-mail inválido."; die;   
    }
}

// Não podemos deixar um post vazio.
if (!isset($_POST['password']) || empty($_POST['password'])) {
    echo 'Senha precisa ser preenchida'; die;
}
else {
    $password = $_POST['password'];

    if(!preg_match('/^(?=.*[A-Za-z])(?=.*[0-9])[\w$@]{8,}$/', $password)) {
        echo "Senha inválida. A senha deve conter no mínimo 8 caracteres e conter pelo menos 1 letra e 1 número."; die;
    }
}

$con = new Conexao();
$con->conectar();
echo $msg;

$cadastro = new Cadastro();
$cadastro->insert('cadastro', $_POST);
$cadastro->select('cadastro');