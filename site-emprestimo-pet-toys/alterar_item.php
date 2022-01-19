<?php
    session_start();
    include_once("conexao.php");

    $iditem = $_GET['iditem'];
    /*if (empty($id)) {
        header("Location: index.php");
        exit();
    }*/

    $result_item = "SELECT * FROM itens WHERE id = '$iditem' LIMIT 1";
    $resultado_item = mysqli_query($conn, $result_item);
    $row_item = mysqli_fetch_assoc($resultado_item);
 
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
            <h1 style="text-align: center;">Alterar item</h1>
            
            <p style="text-align: center; color: darkred;">
            <?php
            if (isset($_SESSION['msg2'])) {
                echo $_SESSION['msg2'];
                unset ($_SESSION['msg2']);
            }
            ?>
            </p>

    

            <form action="alterar_item_proc.php" method="post" name="formitem">

            <input type="hidden" name="iditem" value="<?php echo $row_item['id'];?>">

            <p><label for="idNome">Nome do item</label></p>
            <p><input type="text" name="nomeitem" id="idNome" value="<?php echo $row_item['nomeitem'];?>"></p>
            
            <p><label for="descricao">Descrição</label></p>
            <p><input type="text" name="descricao" id="descricao" value="<?php echo $row_item['descricao'];?>"></p>

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
            
            <p><label for="carregarfoto">Carregar foto do item</label></p>
            <p><input type="file" name="carregarfoto" id="carregarfoto" placeholder="Upload"></p>
   
            <br>
            <input type="submit" value="Alterar item">
            </form>  
            
           

            <?php
                echo "<a class='botao' href='deletar_item.php?iditem=$iditem' style='color: darkred;'>Deletar item</a>";
            ?>
            <br><br>
            <a class="botao" href="dados.php">Voltar</a>
        </div>
           

    </section>

    <footer>
         
    </footer>
</body>
</html>