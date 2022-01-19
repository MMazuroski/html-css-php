<?php
    session_start();
    include_once ("conexao.php");

    $iditem = $_GET['iditem'];
    /*if (empty($id)) {
    header("Location: index.php");
    exit();
    }*/
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
            $del_item = "DELETE FROM `itens` WHERE `itens`.`id` = $iditem LIMIT 1";
            $deletar_item = mysqli_query($conn, $del_item);
        ?>
 
        <div class="cadastro">
           <h1>Item removido!</h1>
           <p style="text-align: center;"><a class="botao" href="index.php">Voltar</a></p>
        </div>
        


    </section>

    <footer>
         
    </footer>
</body>
</html>