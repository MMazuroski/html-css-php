<?php
    session_start();
    include_once ("conexao.php");

    $id = $_GET['id'];
    if (empty($id)) {
    header("Location: index.php");
    exit();
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

        <?php
            $dev_item = "UPDATE `itens` SET `situacao` = 'Disponivel', `emprestadopara` = '', `dataemp` = NULL, `datadev` = NULL WHERE `itens`.`id` = $id;";
            $devolucao_item = mysqli_query($conn, $dev_item);
        ?>
 
        <div class="cadastro">
           <h1>Item devolvido!</h1>
           <p style="text-align: center;"><a class="botao" href="index.php">Voltar</a></p>
        </div>
        


    </section>

    <footer>
         
    </footer>
</body>
</html>