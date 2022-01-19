<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empréstimo de pet toys</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div id="titulo">Empréstimo<br>Pet Toys</div>
    </header>

    <section class="central">

 
        <div class="cadastro">
            <h1 style="text-align: center;">Login</h1>
            
            <p style="text-align: center; color: darkred;">
                <?php if (isset($_SESSION['loginErro'])) {
                echo $_SESSION['loginErro'];
                unset($_SESSION['loginErro']);
                }

                if (isset($_SESSION['cadastro'])) {
                    echo $_SESSION['cadastro'];
                    unset ($_SESSION['cadastro']);
                }
                ?>
            </p>
            <form action="valida.php" method="post" name="formcadastro">
            
            <p><label for="email">E-mail</label></p>
            <p><input type="email" name="email" id="email"></p> 

            <p><label for="senha">Senha</label></p>
            <p><input type="password" name="senha" id="senha"></p>


            <br>
            <input type="submit" value="Login">
            
            </form>

            <a  class="botao" href="cadastro.php">Fazer cadastro</a> 
            <a style="margin-left: 50px;" class="botao" href="index.php">Voltar</a> 
        </div>
           

    </section>

    <footer>
         
    </footer>
</body>
</html>