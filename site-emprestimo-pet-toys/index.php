<?php
    session_start();
    include_once ("conexao.php");
    header('Content-Type: text/html; charset=UTF-8');
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

    <?php
        $item_cadastrado = array("Item 1", "Item 2", "Item 3", "item 4", "Item 5", "Item 6", "Item 7", "Item 8");
    ?>


    <header>
        <div id="titulo">Empréstimo<br>Pet Toys</div>
    </header>

    <section class="central">

    <div class="barra">
        <h1>
        <a class="botaoini" href="novoitem.php">Novo item</a>
        <a class="botaoini" href="dados.php">Meus empréstimos</a>
        <a class="botaoini" href="login.php">Login</a>
        </h1>
    </div>

    <h1>
    <ul class="lista" style="list-style-type: none;">



    
        <?php 
        
        $result_itens = "SELECT * FROM itens";
        $resultado_itens = mysqli_query($conn, $result_itens);
        while ($row_itens = mysqli_fetch_assoc($resultado_itens)) {
            $id = $row_itens['id'];
            $nomeitem = $row_itens['nomeitem'];      
            $situacao = $row_itens['situacao'];
            $datadev = $row_itens['datadev'];
            $foto = $row_itens['foto'];

            echo "<li class='lista item'>
            <div class='lista foto'>
                <img src='./fotos/$foto' alt='foto' width='180px'>
            </div>
            <h2 style='width: 220px; margin: auto;'>$nomeitem</h2>
            <p>Situação: $situacao</p>";
            if ($situacao == "Emprestado") {
                echo "Devolução: $datadev";
            } else {
                $_SESSION['item'] = $nomeitem;
                echo "<a class='emprestar' href='emprestimo.php?id=$id'>Emprestar</a>";
            }
        }
        ?>

    </ul>        
    </section>

    <footer>
         
    </footer>
</body>
</html>