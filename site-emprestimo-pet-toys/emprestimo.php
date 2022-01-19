<?php
session_start();
include_once ("conexao.php");
if (!isset($_SESSION['usuarioNome'])) {
    $_SESSION['loginErro'] = "Faça seu login para realizar empréstimos";
    header("Location: login.php");
}


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



    <?php
   
        $result_itens = "SELECT * FROM itens WHERE id = $id LIMIT 1";
        $resultado_itens = mysqli_query($conn, $result_itens);
        $resultado = mysqli_fetch_assoc($resultado_itens);
           
        $_SESSION['emp_id'] = $resultado['id'];
        $_SESSION['emp_nomeitem'] = $resultado['nomeitem'];      
        $_SESSION['emp_descricao'] = $resultado['descricao'];
        $_SESSION['emp_categoria'] = $resultado['categoria'];
        $_SESSION['emp_dono'] = $resultado['dono'];
        $_SESSION['emp_contatodono'] = $resultado['contatodono'];
        $foto = $resultado['foto'];


        /*$nomeitem = "NOME";
        $descricao = "DESCRIÇÃO";
        $categoria = "CATEGORIA";
        $dono = "DONO";
        $contatodono = "CONTATO DONO";*/
    ?>

    <header>
        <div id="titulo">Empréstimo<br>Pet Toys</div>
    </header>

    <section class="central">

 
        <div class="cadastro">
            <h1 style="text-align: center;">Empréstimo de item</h1>
            
            <p>
            <?php
            if (isset($_SESSION['msg3'])) {
                echo $_SESSION['msg3'].'<br>';
                unset ($_SESSION['msg3']);
            }
            ?>
            </p>

            <?php echo "<img style='float: right; margin-left: 1.5rem; margin-top: 0.2rem;border: 1px solid darkslategray' src='./fotos/$foto' alt='foto' width='110px'>";?>

            <form action="emprestimo_proc.php" method="post" name="formemprestimo">
            <p class="emprestimo">Nome do item</p>
            <p><?php echo $_SESSION['emp_nomeitem'];?></p>
            <br>

            <p class="emprestimo">Descrição</p>
            <p><?php echo $_SESSION['emp_descricao'];?></p>
            <br>

            <p class="emprestimo">Categoria</p>
            <p><?php echo $_SESSION['emp_categoria'];?></p>
            <br>

            <p class="emprestimo">Dono</p>
            <p><?php echo $_SESSION['emp_dono'];?></p>
            <br>

            <p class="emprestimo">Contato dono</p>
            <p><?php echo $_SESSION['emp_contatodono'];?></p>
            <br>
            
            <label for="dataemp">Data empréstimo</label>
            <p><input type="date" name="dataemp" id="dataemp"></p>

            <label for="datadev">Data devolução</label>
            <p><input type="date" name="datadev" id="datadev"></p>
        
          
            <br>

            

            <input type="submit" value="Emprestar">
            </form>
            <a class="botao" href="index.php">Voltar</a> 
               
        </div>
           

    </section>

    <footer>
         
    </footer>
</body>
</html>