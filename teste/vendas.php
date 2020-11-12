<?php
    session_start();
    if($_SESSION["status"] !="OK"){
        header('location:index.php');
    }
    if($_SESSION["tipo"] !="cliente"){
        header('location:inicio.php');
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>AVALIAÇÃO</title>
        <meta charset = "UTF-8"/>
        <link rel="shortcut icon" href="imagens/icomush.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="estilo2.css"/>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </head>
    <body>
    <?php
            include("menu.php");
        ?> 
            <div class="container" >
                <a href="carrinho.php" class="btn btn-success"><h1 style="text-decoration: none;" >Carrinho
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="fill:white;">
                        <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                    </svg>
                </h1></a>
            </div>
        <div class="container">
        <div class='row justify-content-left'>
                    <div class='col-md-6'>
                    <div class="card border border-success" style="width: 70rem;">
                    <div class="menu">
                        <h3 class="card-title text-center text-white">     
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="fill: white;">
                                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg>
                        Procurar Produto
                        </h3>
                    </div>
                    <div class="card-body text-left font-weight-bold">
                        <form name="procura" id="procura" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <label>Nome</label> 
                            <input type="text" name="procura" placeholder="Digite um nome ou uma letra" maxlength="30" autofocus class="form-control" />
                            <br/>
                            <input type="submit" value="Procurar" class="btn btn-success" />  
                            <hr/>
                            <div>
                                <?php
                                    include("conecta.php");
                                    echo "<h3>Pesquisar por letra</h3>";
                                    $letra = mysqli_query($conn, "SELECT DISTINCT LEFT(descricao, 1) AS letra from produtos ORDER BY letra");
                                    while($letras = mysqli_fetch_array($letra)){
                                        $inicial = strtoupper($letras['letra']);
                                        echo '<button style="margin-top: 2%; margin-left: 2%" type="submit" class="btn btn-success" value="'.$inicial.'" name="letra"><b>'.$inicial.'</b></button>';
                                    }
                                ?>
                            </div> 
                        </div>
                    </div>
                            <br/>
                            <hr/>
                        </form>
                         </div>
                     </div>
                </div>
                </div>


                    
        <hr class="container"/>
    <div class="container">
        <?php
            if(!isset($_POST['procura']) && !isset($_POST['letra'])){
                echo "<h2>Faça a sua pesquisa!</h2>";
            } else{
                if(isset($_POST['letra'])){
                    $busca2 = trim($_POST['letra']);
                } else {
                    $busca2 = "";
                }
                $busca = trim($_POST['procura']);
                $cases = array($busca, $busca2);
                switch($cases){
                    case($cases[0] !=="" && $cases[1] == ""):
                        $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE descricao LIKE '".$busca."%' ORDER BY status_produto, descricao;") or die (mysqli_error($conn));
                    break;
                    case($cases[1] !== ""):
                        $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE descricao LIKE '".$busca2."%' ORDER BY status_produto, descricao;") or die (mysqli_error($conn));
                    break;
                    case($cases[0] =="" && $cases[1] == ""):
                        $sql = mysqli_query($conn, "SELECT * FROM produtos ORDER BY status_produto, descricao;") or die (mysqli_error($conn));
                    break;
                }
                echo "<h1>Produtos</h1>";
                echo "<div class='container'>
                        <div class='row justify-content-left'>";
                while($produto = mysqli_fetch_array($sql)){
                    echo "<div class='col-md-3' style='margin-top: 5%;'>
                                <div class='card shadow border border-success' style='width: 15rem;' >
                                    <div class='card-header text-center'>
                                    <h5><b>".$produto['descricao']."</b></h5>
                                    </div>
                                    <div class='card-body text-center'>
                                        <b>Preço:</b> ".number_format($produto['valor'],2,",",".")."<br/>";
                                    if($produto['status_produto']=="A"){  
                                        echo "<b>Estoque:</b> ".$produto['estoque']."<br/>";
                                    }
    
                                    if($produto['status_produto']=="I"){
                                        echo "<b>Status:</b> <p  style='color:red'>INDISPONIVEL</p>";
                                    }
                                    
                                    if($produto['status_produto']=="A"){      
                                    echo "<div class='justify-content-center'> 
                                    <form name='carrinho' id='cart' action='carrinho.php?add=carrinho&id=".$produto['idprodutos']."&cliente=$id' method='post'>
                                    <label><b>Quantidade</b></label>
                                    <br/>
                                    <input min='1' name='qtde' placeholder='1' value='1' class='form-control text-center'/>
                                    <br/>
                                    <input type='submit' value='Adicionar ao Carrinho' class='btn btn-success' />
                                    </form>
                                    </div>";
                                    }
                                    echo "</div>
                                </div>
                        </div>";  
                }
                echo "</div>  
                </div>";
                mysqli_close($conn);
            }
            ?>
        </div>
        </div>  

    </body>
</html>