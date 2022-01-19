<?php
    session_start();
    include_once ("conexao.php");
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
            
        $item_cadastrado = array("Item 1", "Item 2", "Item 3");
        $item_emprestado = array("Item 01", "Item 02", "Item 03", "Item 04");
    ?>


    <header>
        <div id="titulo">Empréstimo<br>Pet Toys</div>
    </header>

    <section class="central">

 
        <div class="cadastro">
            <h1 style="text-align: center;">Área do usuário</h1>
            
            <p style="text-align: center; color: darkred;">
                <?php if (!isset($_SESSION['usuarioNome'])) {
                    $_SESSION['loginErro'] = "Faça seu login";
                    header("Location: login.php");
                } elseif (isset($_SESSION['cadastroitem'])) {
                    echo $_SESSION['cadastroitem'];
                    unset ($_SESSION['cadastroitem']);
                } elseif (isset($_SESSION['emprestimoitem'])) {
                    echo $_SESSION['emprestimoitem'];
                    unset ($_SESSION['emprestimoitem']);
                } elseif (isset($_SESSION['altcadastro'])) {
                    echo $_SESSION['altcadastro'];
                    unset ($_SESSION['altcadastro']);
                } elseif (isset($_SESSION['altitem'])) {
                    echo $_SESSION['altitem'];
                    unset ($_SESSION['altitem']);
                }
                ?>
            </p>
            <h2>Dados</h2>
            <div class="divisao">
                
            <h3>Nome</h3>
            <p><?php echo $_SESSION['usuarioNome'];?></p>
 
            <h3>E-mail</h3>
            <p><?php echo $_SESSION['usuarioEmail'];?></p></p>
            
            <h3>Telefone</h3>
            <p><?php echo $_SESSION['usuarioTelefone'];?></p></p>
            
           
            <br><a class="botao" href="alterar_cadastro.php">Alterar dados</a>
            </div>
                       
            <h2>Itens cadastrados</h2>
            <div class="divisao"> 
  
            <br><a class="botao" href="novoitem.php">Novo item</a>
            
            <?php 
                $email = $_SESSION['usuarioEmail'];
                $result_itens = "SELECT * FROM itens WHERE dono = '$email'";
                $resultado_itens = mysqli_query($conn, $result_itens);
                while ($row_itens = mysqli_fetch_assoc($resultado_itens)) {
                    $iditem = $row_itens['id'];
                    $nomeitem = $row_itens['nomeitem'];      
                    $categoria = $row_itens['categoria'];
                    $situacao = $row_itens['situacao'];
                    $datadev = $row_itens['datadev'];
                    
                    echo "<h3>$nomeitem</h3>";
                    echo "<p>$categoria</p>";
                    echo "<p>$situacao</p>";
                    if ($situacao == 'Emprestado') {
                        echo "<p>Devolução em $datadev</p>";
                    } else {
                        echo "<a class='botao' href='alterar_item.php?iditem=$iditem'>Alterar item</a>";
                    }
                }
            ?>
            </div>

            <h2>Itens emprestados</h2>
            <div class="divisao">

            <?php 
                $email = $_SESSION['usuarioEmail'];
                $result_itens = "SELECT * FROM itens WHERE emprestadopara = '$email'";
                $resultado_itens = mysqli_query($conn, $result_itens);
                while ($row_itens = mysqli_fetch_assoc($resultado_itens)) {
                    $id = $row_itens['id'];
                    $nomeitem = $row_itens['nomeitem'];      
                    $situacao = $row_itens['situacao'];
                    $datadev = $row_itens['datadev'];
                    
                    echo "<h3>$nomeitem</h3>";
                    echo "<a class='botao' href='devolver.php?id=$id'>Devolver</a>";
                }
            ?>
            
            </div>
            <br>
              
            <a class="botao" href="logout.php">Sair</a>  
            <a style="margin-left: 50px;" class="botao" href="index.php">Voltar</a> 
        </div>
           

    </section>

    <footer>
         
    </footer>
</body>
</html>