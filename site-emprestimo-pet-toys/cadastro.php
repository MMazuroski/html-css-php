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
            <h1 style="text-align: center;">Cadastro de usuário</h1>
            
            <p style="text-align: center; color: darkred;"
            <?php
            if (isset($_SESSION['erro']))
            echo $_SESSION['erro'];
            unset ($_SESSION['erro']);
            ?></p>

            <form action="cadastro_proc.php" method="post" name="formcadastro">
            <p><label for="idNome">Nome completo</label></p>
            <p><input type="text" name="nome" id="idNome"></p>
            
            <p><label for="email">E-mail</label></p>
            <p><input type="email" name="email" id="email"></p> 
            
            <p><label for="telefone">Telefone</label></p>
            <p><input type="tel" name="telefone" id="telefone" placeholder="(XX) XXXXX-XXXX"></p>

            <!---
            <p><label for="sexo">Sexo</label></p>
            <p>
                <input style="width: 1rem;" type="radio" name="sexo" id="f" value="F">
                <label for="f">Feminino</label>
                <input style="width: 1rem;" type="radio" name="sexo" id="m" value="M">
                <label for="m">Masculino</label>
            </p>-->

            <p><label for="senha">Senha</label></p>
            <p><input type="password" name="senha" id="senha"></p>

            <p><label for="confsenha">Confirmar Senha</label></p>
            <p><input type="password" name="confsenha" id="confsenha"></p>

            <br>
            <input type="submit" value="Enviar">
            
            </form>
            <a class="botao" href="index.php">Voltar</a> 
        </div>
           

    </section>

    <footer>
         
    </footer>
</body>
</html>