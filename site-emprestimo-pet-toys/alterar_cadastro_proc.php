<?php
    session_start();
    include_once ("conexao.php");

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
    $confirmaSenha = md5(filter_input(INPUT_POST, 'confsenha', FILTER_SANITIZE_STRING));

    echo $id.'<br>';
    echo $senha.'<br>';
    echo $confirmaSenha.'<br>';
    echo md5( );

    if (empty($nome) || empty($email) || empty($telefone) ||  $senha == "d41d8cd98f00b204e9800998ecf8427e") {
        $_SESSION['erro'] = "<p style='text-align: center;'>Preencha todos os campos</p>";
        header("Location: alterar_cadastro.php");
    } elseif($senha != $confirmaSenha) {
        $_SESSION['erro'] = "<p style='text-align: center;'>Digite a mesma senha duas vezes</p>";
        header("Location: alterar_cadastro.php");
    } else {
        $result_usuario = "UPDATE usuarios SET nome='$nome', email='$email', telefone='$telefone', senha='$senha' WHERE id='$id' LIMIT 1";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        
        if (mysqli_affected_rows($conn)) {
            $_SESSION['altcadastro'] = "<p style='text-align: center;'>Usuário alterado com sucesso!</p>";
            header("Location: dados.php");

            $emailantigo = $_SESSION['usuarioEmail'];
            $telefoneantigo = $_SESSION['usuarioTelefone'];

            $result_itens = "UPDATE itens SET dono='$email', contatodono='$telefone' WHERE dono='$emailantigo'";
            $resultado_itens = mysqli_query($conn, $result_itens);

            $result_itens = "UPDATE itens SET emprestadopara='$email' WHERE emprestadopara='$emailantigo'";
            $resultado_itens = mysqli_query($conn, $result_itens);

            $_SESSION['usuarioNome'] = $nome;
            $_SESSION['usuarioEmail'] = $email;
            $_SESSION['usuarioTelefone'] = $telefone;
            $_SESSION['usuarioSenha'] = $senha;

        } else {
            $_SESSION['erro'] = "<p style='text-align: center;'>Falha na alteração de cadastro</p>";;
            header("Location: alterar_cadastro.php");
        }
    }