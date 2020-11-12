<?php 
    session_start();
    $qtde_atualiza = 0;
    $valor_total = 0;
    
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
        <a href="limpacarrinho.php">limpar</a>
    <?php
        include("menu.php");
 
        if(!empty($_POST["qtde_atualizada"])){
            $qtde_atualiza = $_POST["qtde_atualizada"];   
        }
        else{ 
            if (!empty($_POST["qtde"])) {    
                $qtd = $_POST["qtde"]; 
            }
            else{
                $qtd = 1;
            }
        }



        if(!isset($_SESSION["itens"])){
            $_SESSION["itens"] = array ();
        }

        if(isset($_GET["add"]) && $_GET["add"] == "carrinho"){
        $idproduto = $_GET["id"];

        if(!isset($_SESSION["itens"][$idproduto])){
            $_SESSION["itens"][$idproduto] = $qtd;
        }
        else{
            if($qtd == 1){
                $_SESSION["itens"][$idproduto] +=1;
            }
            else{
                if($qtd > 1){
                    $_SESSION["itens"][$idproduto] +=$qtd;  
                }
            }
        }
        }else{
            if(empty($_SESSION["itens"])){
            echo '<h1 class="text-center"><br/>Ops,Nada no carrinho</h1>';
            echo "<div class='row justify-content-center'><a href='vendas.php' class='btn btn-success'><h1>Escolher Produtos</h1></a></div";
            }
        }

        if(!empty($_GET["idatualiza"])){
            $idatualiza = $_GET["idatualiza"];
            $_SESSION["itens"][$idatualiza] = $qtde_atualiza;
        }


        echo "<div class='container'>
                <div class='row justify-content-left'>";
        include("conecta.php");
        foreach($_SESSION["itens"] as $idproduto => $quantidade){
            $result = mysqli_query($conn, "SELECT * FROM produtos WHERE idprodutos='$idproduto';") or die (mysqli_error($conn));
            $produto = mysqli_fetch_array($result);
            $preco = $produto["valor"];
            $total = $produto["valor"] * $quantidade;
            $descricao = $produto["descricao"];
            $valor_total += $produto["valor"] * $quantidade;

            echo "  <div class='col-md-3' style='margin-top: 5%;'>
                        <div class='card shadow border border-success' style='width: 15rem;' >
                            <div class='card-header text-center'>
                                <h5><b>".$descricao."</b></h5>
                            </div>
                            <div class='card-body text-center'>
                            <form name='procura' id='procura' action='carrinho.php?&idatualiza=$idproduto' method='post'>
                            <label><b>Preço Un. </b>".number_format($preco,2,",",".")."</label>
                            <br/>
                            <label><b>Subtotal: </b>".number_format($total,2,",",".")."</label>
                            <br/>
                            <label><b>Quantidade</b></label>
                            <br/>
                            <input type='number' min=1 name='qtde_atualizada' placeholder='0' value = '$quantidade' class='form-control text-center'/>
                            <br/>
                            <input type='submit' value='Atualizar' class='btn btn-success btn-sm'>
                            <a href='apaga_produto_carrinho.php?id=$idproduto' class='btn btn-danger btn-sm'>Excluir</a>
                            </form>
                            </div>
                        </div>
                    </div>";
        }
        echo "</div>
        </div>
        </form>";
        if($valor_total > 0){
        echo "<br/><h1 class='text-center'>Valor Total: ".number_format($valor_total,2,",",".")."</h1>";
        echo "<div class='row justify-content-center'>
                <a class='btn btn-success' href='cadpedido.php?cliente=$id&valor=$valor_total'>Finalizar pedido</a>
            </div>";
        }
    ?>
</html>