<?php
$user = $_SESSION["user"];
$tipo = $_SESSION["tipo"];
$id = $_SESSION["id"]; 
if($tipo = $_SESSION["tipo"] =="vendedor"){
  echo "<nav class='navbar navbar-expand-lg navbar-dark bg-success'>

    <a class='navbar-brand' href='inicio.php'>
      <img src='logo_menu.png' width='120' height='80' style='margin-right: 50px;'>
    </a>
    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
      <ul class='navbar-nav mr-auto'>
        <li class='nav-item'>
          <div>
          <a class='nav-link' href='inicio.php'>
          <div>
            <svg width='2em' height='2em' viewBox='0 0 16 16' class='rounded mx-auto d-block bi bi-house-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
            <path fill-rule='evenodd' d='M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z'/>
            <path fill-rule='evenodd' d='M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z'/>
            </svg>
          </div
          <br/> 
          HOME
          </a>
          </div>
        </li>
        <li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            <svg width='2em' height='2em' viewBox='0 0 16 16' class='rounded mx-auto d-block bi bi-file-earmark-person' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
              <path d='M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z'/>
              <path d='M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z'/>
              <path fill-rule='evenodd' d='M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6z'/>
              <path d='M8 12c4 0 5 1.755 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12z'/>
            </svg>
          PESSOAS
          </a>
          <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
          <a class='dropdown-item' id='cortexto' href='cliente.php' style='text-align: center;'>CLIENTES</a>
          <hr/>
          <a class='dropdown-item' id='cortexto' href='vendedor.php' style='text-align: center;'>VENDEDORES</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='produto.php'>
          <svg width='2em' height='2em' viewBox='0 0 16 16' class='rounded mx-auto d-block bi bi-basket2' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
          <path d='M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z'/>
          <path fill-rule='evenodd' d='M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z'/>
          </svg>
          PRODUTOS
          </a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='pedido.php'>
            <svg width='2em' height='2em' viewBox='0 0 16 16' class='rounded mx-auto d-block bi bi-card-list' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
              <path fill-rule='evenodd' d='M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z'/>
              <path fill-rule='evenodd' d='M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z'/>
              <circle cx='3.5' cy='5.5' r='.5'/>
              <circle cx='3.5' cy='8' r='.5'/>
              <circle cx='3.5' cy='10.5' r='.5'/>
            </svg>
          PEDIDOS
          </a>
        </li>
      </ul>
    </div>

    <a class='navbar-brand' style='text-transform: uppercase;'>$user</a>
    <div class='dropdown'>
    <a href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='border-radius: 100%;'>
        <div class='dropdown'>
            <svg width='3em' height='3em' viewBox='0 0 16 16' class='bi bi-person-circle' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                <path d='M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z'/>
                <path fill-rule='evenodd' d='M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z'/>
                <path fill-rule='evenodd' d='M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z'/>
            </svg>
        </div>
    </a>
    <ul class='dropdown-menu w-100' aria-labelledby='menu1'>
        <li><a style='color: black' href='sair.php'>Sair</a></li>
    </ul>
    </div>
    </div>
  </nav>";
}else{
  echo "<nav class='navbar navbar-expand-lg navbar-dark bg-success'>

  <a class='navbar-brand' href='inicio.php'>
    <img src='logo_menu.png' width='120' height='80' style='margin-right: 50px;'>
  </a>
  <div class='collapse navbar-collapse' id='navbarSupportedContent'>
    <ul class='navbar-nav mr-auto'>
      <li class='nav-item'>
        <div>
        <a class='nav-link' href='inicio.php'>
        <div>
          <svg width='2em' height='2em' viewBox='0 0 16 16' class='rounded mx-auto d-block bi bi-house-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
          <path fill-rule='evenodd' d='M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z'/>
          <path fill-rule='evenodd' d='M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z'/>
          </svg>
        </div
        <br/> 
        HOME
        </a>
        </div>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='vendas.php'>
        <svg width='2em' height='2em' viewBox='0 0 16 16' class='rounded mx-auto d-block bi bi-basket2' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
        <path d='M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z'/>
        <path fill-rule='evenodd' d='M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z'/>
        </svg>
        COMPRAR
        </a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='pedido.php'>
          <svg width='2em' height='2em' viewBox='0 0 16 16' class='rounded mx-auto d-block bi bi-card-list' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
            <path fill-rule='evenodd' d='M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z'/>
            <path fill-rule='evenodd' d='M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z'/>
            <circle cx='3.5' cy='5.5' r='.5'/>
            <circle cx='3.5' cy='8' r='.5'/>
            <circle cx='3.5' cy='10.5' r='.5'/>
          </svg>
        MEUS PEDIDOS
        </a>
      </li>
    </ul>
  </div>

  <a class='navbar-brand' style='text-transform: uppercase;'>$user</a>
  <div class='dropdown'>
  <a href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='border-radius: 100%;'>
      <div class='dropdown'>
          <svg width='3em' height='3em' viewBox='0 0 16 16' class='bi bi-person-circle' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
              <path d='M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z'/>
              <path fill-rule='evenodd' d='M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z'/>
              <path fill-rule='evenodd' d='M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z'/>
          </svg>
      </div>
  </a>
  <ul class='dropdown-menu' aria-labelledby='menu1'>
      <li><a style='color: black' href='sair.php'>Sair</a></li>
  </ul>
  </div>
  </div>
</nav>";
}
?>

