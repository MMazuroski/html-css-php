<?php
    session_start();
    include_once ("conexao.php");

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    //$sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
    $senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
    $confirmaSenha = md5(filter_input(INPUT_POST, 'confsenha', FILTER_SANITIZE_STRING));

    if (empty($nome) || empty($email) || empty($telefone) || empty($senha) || empty($confirmaSenha)) {
        $_SESSION['erro'] = "<p style='text-align: center;'>Preencha todos os campos</p>";
        header("Location: cadastro.php");
    } elseif($senha != $confirmaSenha) {
        $_SESSION['erro'] = "<p style='text-align: center;'>Digite a mesma senha duas vezes</p>";
        header("Location: cadastro.php");
    } else {
        $result_usuario = "INSERT INTO usuarios (nome, email, telefone, senha) VALUES ('$nome', '$email', '$telefone', '$senha')";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        
        if (mysqli_insert_id($conn)) {
            $_SESSION['cadastro'] = "<p style='text-align: center;'>Usuário cadastrado com sucesso!</p>";
            header("Location: login.php");
        } else {
            $_SESSION['erro'] = "<p style='text-align: center;'>Falha no cadastro</p>";;
            header("Location: cadastro.php");
        }
    }