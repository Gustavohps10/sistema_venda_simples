<?php
    session_start();
    if($_SESSION["status"] !="OK"){
        header('location:index.php');
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
    <body>
    <?php
        include("menu.php");  
        if($_SESSION["tipo"] == "vendedor"){
            echo "<div class='container'>
                <div class='row justify-content-center'>
                    <div class='col-md-4'>
                     <div class='card shadow' style='width: 20rem;'>
                         <div class='inner'>
                             <img src='pessoas.jpg' class='card-img-top' alt='card image cap'>
                         </div>
                         <div class='card-body text-center'>
                             <h5 class='card-title'>Pessoas</h5>
                             <p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             </p>
                             <a href='cliente.php' class='btn btn-outline-success'>Ver Clientes</a>
                             <a href='vendedor.php' class='btn btn-outline-success'>Ver Vendedores</a>
                         </div>
                     </div>
                </div>

                    <div class='col-md-4'>
                        <div class='card shadow' style='width: 20rem;'>
                            <div class='inner'>
                                <img src='img-produtos.jpg' class='card-img-top' alt='card image cap'>
                            </div>
                            <div class='card-body text-center'>
                                <h5 class='card-title'>Produtos</h5>
                                <p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                </p>
                                <a href='produto.php' class='btn btn-outline-success'>Ver Produtos</a>
                            </div>
                         </div>
                    </div>

                    <div class='col-md-4'>
                     <div class='card shadow' style='width: 20rem;'>
                         <div class='inner'>
                             <img src='pedidos.png' class='card-img-top' alt='card image cap'>
                         </div>
                         <div class='card-body text-center'>
                             <h5 class='card-title'>Pedidos</h5>
                             <p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             </p>
                             <a href='pedido.php' class='btn btn-outline-success'>Ver Pedidos</a>
                         </div>
                     </div>

                </div>        
             </div>";

        }
        else{
            if($_SESSION["tipo"] == "cliente"){
                echo "<div class='container'>
                <div class='row justify-content-center'>
                    <div class='col-md-4'>
                     <div class='card shadow' style='width: 20rem;'>
                         <div class='inner'>
                             <img src='carrinho.jpg' class='card-img-top' alt='card image cap'>
                         </div>
                         <div class='card-body text-center'>
                             <h5 class='card-title'>Realizar Pedido</h5>
                             <p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             </p>
                             <a href='vendas.php' class='btn btn-outline-success'>Vamos lá</a>
                         </div>
                     </div>
                    </div>
                    <div class='col-md-4'>
                     <div class='card shadow' style='width: 20rem;'>
                             <div class='inner'>
                                 <img src='pedidos.png' class='card-img-top' alt='card image cap'>
                             </div>
                             <div class='card-body text-center'>
                                 <h5 class='card-title'>Visualizar Meus Pedidos</h5>
                                 <p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                 </p>
                                 <a href='pedido.php' class='btn btn-outline-success'>Vamos lá</a>
                             </div>
                         </div>
                    </div>
                </div>        
             </div>";
            }
        }
    ?>
    </body>
</html>