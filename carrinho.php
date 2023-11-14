<?php
session_start();
$conexao = mysqli_connect('localhost','root','','weka_commerce');
mysqli_set_charset($conexao, "utf8");

if (!isset($_SESSION['carrinho'])) {
  $_SESSION['carrinho'] = array();
  echo $_SESSION['carrinho'];
}

    /**ADICIONA PRODUTO**/
    if (isset($_GET['acao'])) {
      if ($_GET['acao'] == 'add') {
        $id = intval($_GET['id']);
        if (!isset($_SESSION['carrinho'][$id])) {
          $_SESSION['carrinho'][$id] = 1;
        //  echo $_SESSION['carrinho'][$id];
      //  var_dump($_SESSION['carrinho']);
          header('Location: app.php?sucesso');
        } else {
          $_SESSION['carrinho'][$id] += 1;
        //  print_r($_SESSION['carrinho']);
        header('Location: app.php?sucesso');
        }
      }

      if($_GET['acao'] == 'del') {
          $id = intval($_GET['id']);
          if (isset($_SESSION['carrinho'][$id])){
            unset($_SESSION['carrinho'][$id]);
          }
      }

      if ($_GET['acao'] == 'up') {
        if(is_array($_POST['prod'])){
          foreach ($_POST['prod'] as $id => $qtd) {
            $id = intval($id);
            $qtd = intval($qtd);
            if (!empty($qtd) || $qtd <> 0) {
              $_SESSION['carrinho'][$id] = $qtd;
            }else {
              unset($_SESSION['carrinho'][$id]);
            }
          }
        }
      }

    }



  //print_r("<script>alert(".$_SESSION['carrinho'][$id].")</script>");
//  echo "<script>alert(".$_SESSION['carrinho'][$id].")</script>";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Parallax Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="css/fontawesome.css" media="screen" title="no title" charset="utf-8">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <style media="screen">
  img{
    height: 200px;
  }
  .card-content{
    position: relative;
  }
  .card-title{

    font-weight: bold !important;

    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }
  .card-over:hover .card-title{
    background-color: rgba(0, 0, 0, 0.5);
  }
  .card-title i{
    position: absolute;
    right: 3%;
  }
  table img{
    height: 70px;
    width: 70px;
  }
  </style>
</head>
<body>
  <nav class="white lighten-1" id="navigation" role="navigation">
  <div id="pic" class="">
    <div class="nav-wrapper container">
      <a id="logo-container" href="app.php" class="brand-logo"><img class="" src="img/buscaaki_logo (1).png"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="app.php" class="">Home</a></li>
        <li><a href="#" class="">Shop</a></li>
        <li><a href="#" class="">Sobre</a></li>
        <li><a href="#" class="">Contacto</a></li>
        <li><a href="#" class="">Conta</a></li>
        <li><a href="carrinho.php" class=""><i class="fa fa-shopping-cart"></i>
          <?php
                     if(isset($_SESSION['carrinho'])){
                       $count = count($_SESSION['carrinho']);
                       echo "

                         <span id='contador' class='red-text'>$count</span>
                       ";
                     }else {
                       // code...
                       echo "<span id='contador' class='red-text'>0</span>";
                     }
                  ?>

        </a></li>
        <li><a href="index.php" class="" id="pesqu"><i class="fa fa-search"></i></a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#" class="ativa">Home</a></li>
        <li><a href="#" class="">Shop</a></li>
        <li><a href="#" class="">Sobre</a></li>
        <li><a href="#" class="">Contacto</a></li>
        <li><a href="#" class="">Conta</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="fa fa-chevron-right"></i></a>

    </div>

  </div>

</nav>
  <main class="container" hidden>
    <table class="highlight">
      <thead>
        <tr>
          <th width="244">Produto</th>
          <th width="79">Quantidade</th>
          <th width="89">Preço</th>
          <th width="100">Subtotal</th>
          <th width="64">Remover</th>
        </tr>
      </thead>
      <form class="" action="?acao-up" method="post">
        <tbody>
          <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
          </tr>
          <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td>$3.76</td>
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            <td>$7.00</td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="5">
              <input type="submit" name="name" value="Atualizar">
            </td>
            <td colspan="5">
              <a href="app.php">Contiar Compra</a>
            </td>
          </tr>
        </tfoot>
      </form>

    </table>

  </main>
  <div class="container-fluid">
    <div class="section container" id="compra">
      <div class="center">
        <h1 class="header center light-blue-text">Carrinho</h1>
      </div>



      <!--   Icon Section   -->
      <form class="" action="?acao=up" method="post">
        <div class="row">

          <div class="col s12 m8" id="flexivel">
            <table class="table table-striped">
              <legend class="">PRODUTOS NO CARRINHO</legend>
              <thead>
                <tr class="blue-text">
                  <th scope="col">Apagar</th>
                  <th scope="col">Produto</th>
                  <th scope="col">Preço</th>
                  <th scope="col">Quantidade</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  $total = 0;
                if (count($_SESSION['carrinho']) == 0){
                  echo "<tr><td colspan='5'>Não há produtos</td></tr>";
                } else {
                  foreach ($_SESSION['carrinho'] as $id => $qtd) {
                    $seleciona = "SELECT * FROM tb_produto WHERE id_produto = '$id'";
                    $dadoscapt = mysqli_query($conexao,$seleciona) or die(mysql_errno());
                    $linhas = mysqli_fetch_assoc($dadoscapt);

                    $nome = $linhas['nome_produto'];
                    $preco = number_format($linhas['valor_venda'], 2, ',', ',');
                    $sub = number_format($linhas['valor_venda'] * $qtd, 2, ',', ',');
                    $img = $linhas['imagem_produto'];

                    $total += intval($sub);

                ?>
                <tr>
                  <th scope="row center">
                    <a href="?acao=del&id=<?=$id?>" class="red-text" style="font-size: 35px; font-weight: bold;"><i class="fa fa-remove"></i></a>
                  </th>
                  <td class="" style="display: flex; justify-content: space-around; align-items: center;">
                    <img src="imagens/<?=$img?>" alt="pic"> <span style=""><?=$nome?></span>
                  </td>
                  <td><?=$preco?></td>
                  <td class="center">
                    <input type="number" size="2" name="prod[<?=$id?>]" id="prod<?=$id?>" min="0" max="99" value="<?=$qtd?>">
                  </td>
                  <td><?=$sub?></td>
                </tr>
                <?php   }
                } ?>

              </tbody>

            </table>
          </div>
          <div class="col s12 m2">
            <table class="table table-dark table-borderless">
              <legend>TOTAL A PAGAR</legend>
              <thead>
                <tr>
                  <th scope="col" class="blue-text">Subtotal</th>
                  <td scope="col">30.000.00</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th  scope="row" class="blue-text">Entrega</th>
                  <td>
                    <input type="radio" name="entrega" checked=""> <span id="entrega">Enterga gratis</span><br>
                    <input type="radio" name="levar" id="levar">
                    <span id="leva" for="leva">Entraga Em Angola</span>

                  </td>

                </tr>
                <tr>
                  <th scope="row" class="blue-text">Total</th>
                  <?php if(!empty($total)) {?>
                  <td><?=$total?>.000.00</td>
                  <?php }else { ?>
                      <td>00</td>
                   <?php } ?>
                </tr>
                <tr>
                  <td colspan="2">
                    <button type="submit" class="btn pink" style="width: 100%;">Comprar</button>
                  </td>
                </tr>
              </tbody>

            </table>
          </div>
        </div>
      </form>
    </div>
    <br><br>
  </div>

  <footer class="page-footer light-blue">
    <div class="container">
      <div class="row" id="pc">
        <div class="col l6 s12">
          <h5 class="white-text hide">
              <img src="pic/c3.jpg" style="width: 55px; border-radius: 100%;" />
          </h5>
          <p class="grey-text text-lighten-4">Nossa prioridade como empresa é estabelecer diretrizes, com mais alto nível de competência a fim de melhorar a nossa qualidade de serviços em nossa parceria.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Menu</h5>
          <ul class="">
            <li><a class="white-text" href="#!">Home</a></li>
            <li><a class="white-text" href="#!">Shop</a></li>
            <li><a class="white-text" href="#!">Contactos</li>
            <li><a class="white-text" href="#!">Carinho</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Contacta-nós</h5>
          <ul>
            <li><a class="white-text" href="#!"><i class="fa fa-phone"> 927148025</i></a></li>
            <li><a class="white-text" href="#!"><i class="fa fa-whatsapp"> 9784622</i></a></li>
            <li><a class="white-text" href="#!"><i class="fa fa-envelope"> @gamil.com</i></a></li>
            <li><a class="white-text" href="#!"><i class="fa fa-map-marker"> Lunada/Angola</i></a></li>
          </ul>
        </div>
      </div>

      <div class="row center hide" id="mobile" hidden>
        <div class="col s4">
          <p><i class="fa fa-home"></i><br><span>Home</span></p>
        </div>
        <div class="col s4">
          <p><i class="fa fa-user"></i><br><span>Perfil</span></p>
        </div>
        <div class="col s4">
          <p><i class="fa fa-shopping-cart"></i><br><span>Carrinho</span></p>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container" style="display:flex; justify-content: space-between;">
          <p>
              2022<a class="black-text text-lighten-3" href="#">@Paulo Pinto</a>
          </p>

          <ul class="linha" style="display: flex;">
            <li><a class="white-text" href="#!"><i class="fa fa-facebook"></i></a></li>
            <li class="" style="margin: 0 5px;"><a class="white-text" href="#!"><i class="fa fa-twitter"></i></a></li>
            <li><a class="white-text" href="#!"><i class="fa fa-instagram"></i></a></li>
          </ul>
      </div>

    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

</body>
</html>
