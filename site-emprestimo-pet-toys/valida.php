<?php
    session_start();
    include_once("conexao.php");
    if((isset($_POST['email'])) && (isset($_POST['senha']))) {
        $usuario = mysqli_real_escape_string($conn, $_POST['email']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
        $senha = mysqli_real_escape_string($conn, $_POST['senha']);
        $senha = md5($senha);

        $sql = "SELECT * FROM usuarios WHERE email = '$usuario' && senha = '$senha' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $resultado = mysqli_fetch_assoc($result);
        
        if(empty($resultado)) {
            $_SESSION['loginErro'] = "Usuário ou senha inválidos";
            header("Location: login.php");
        } elseif(isset($resultado)) {
            $_SESSION['usuarioId'] = $resultado['id'];
            $_SESSION['usuarioNome'] = $resultado['nome'];
            $_SESSION['usuarioEmail'] = $resultado['email'];
            $_SESSION['usuarioTelefone'] = $resultado['telefone'];
            $_SESSION['usuarioSexo'] = $resultado['sexo'];
            $_SESSION['usuarioSenha'] = $resultado['senha'];
            header("Location: dados.php");
        } else {
            $_SESSION['loginErro'] = "Usuário ou senha inválidos";
            header("Location: login.php");
        }
        
        
        /*
        if(($senha == "123") && ($usuario == "marina@gmail.com")) {
            header("Location: dados.php");
        } else {
            $_SESSION['loginErro'] = "Usuário ou senha inválidos";
            header("Location: login.php");
            //echo"<br>$senha<br>";
        }
        */
    
    } else {
        $_SESSION['loginErro'] = "Usuário ou senha inválidos";
        header("Location: login.php");
    }
?>