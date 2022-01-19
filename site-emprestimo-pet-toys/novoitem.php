<?php
session_start();
if (!isset($_SESSION['usuarioNome'])) {
    $_SESSION['loginErro'] = "Faça seu login para cadastrar um novo item";
    header("Location: login.php");
}   
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
            <h1 style="text-align: center;">Novo item</h1>

            <?php
            if (isset($_SESSION['msg2']))
            echo $_SESSION['msg2'];
            unset ($_SESSION['msg2']);
            ?>

            <form action="novoitem_proc.php" method="post" name="formitem" enctype="multipart/form-data">
            <p><label for="idNome">Nome do item</label></p>
            <p><input type="text" name="nomeitem" id="idNome"></p>
            
            <p><label for="descricao">Descrição</label></p>
            <p><input type="text" name="descricao" id="descricao"></p>

            <p><label for="categoria">Categoria</label></p>
            <input list="categorias" id="categoria" name="categoria">
            <p><datalist id="categorias">
                <option value="Bolinha">
                <option value="Bichinho de pelúcia">
                <option value="Mordedor">
                <option value="Comedor">
                <option value="Osso">
                <option value="Corda">
            </datalist></p> 
            
            <p><label for="foto">Carregar foto do item</label></p>
            <p><input type="file" name="foto" id="carregarfoto" placeholder="Upload"></p>

            <br>
            <input type="submit" value="Cadastrar item">
            </form>   
            <a class="botao" href="index.php">Voltar</a> 
        </div>
           

    </section>

    <footer>
         
    </footer>
</body>
</html>