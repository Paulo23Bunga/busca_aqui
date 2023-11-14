<?php
session_start();
$conexao = mysqli_connect('localhost','root','','weka_commerce');
mysqli_set_charset($conexao, "utf8");

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
  </style>
</head>
<body>
  <nav class="white" role="navigation">
    <div id="pic" class="">
     <div class="nav-wrapper container">
       <a id="logo-container" href="app.php" class="brand-logo"><img class="" src="img/buscaaki_logo (1).png"></a>
       <ul class="right hide-on-med-and-down">
         <li><a href="app.php" class="pink-text">Home</a></li>
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

  <div id="index-banner" class="parallax-container" style="min-width:100%;">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">Loja Shop</h1>
        <div class="row center">
          <h5 class="header col s12 grey-text">Vendemos de tudo e mais alguma coisa...!</h5>
        </div>
        <div class="row center">
          <a href="#" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Vamos Começar</a>
        </div>
        <br><br>

      </div>
    </div>

  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <?php
        $sqlitems = "SELECT * FROM tb_produto ORDER BY nome_produto ASC";
        $resulitems = mysqli_query($conexao, $sqlitems);
        foreach ($resulitems as $key => $value) {
          ?>
          <div class="col s6 m4 l3 hide">
            <div class="card card-over">
              <div class="card-image">
                <img src="imagens/<?=$value['imagem_produto']?>">
                <span class="card-title" style="min-width: 100%;"><?=$value['nome_produto']?></span>
                <a href="?adicionar=<?=$key?>" class="btn-floating halfway-fab waves-effect waves-light red"><i class="fa fa-shopping-cart"></i></a>
              </div>
              <div class="card-content" style="min-height: 150px;">
                <p>Descrição: <?=$value['descricao']?></p>
                <p>Preço: <?=$value['valor_venda']?></p>
              </div>
            </div>
          </div>
          <?php
        }
        ?>
        <?php if (isset($_GET['peqsID'])){

                $idPesq = $_GET['peqsID'];




          $sqlitems1 = "SELECT * FROM tb_produto WHERE id_produto = '$idPesq'";
          $dadositems1 = mysqli_query($conexao, $sqlitems1);
          while($resulitems1 = mysqli_fetch_assoc($dadositems1)) {
          ?>
          <div class="col s6 m4 l3">
            <div class="card">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="imagens/<?=$resulitems1['imagem_produto']?>">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4"><?=$resulitems1['nome_produto']?><i class="fa fa-info-circle right" style=""></i></span>
                <p><a href="carrinho.php?acao=add&id=<?=$resulitems1['id_produto']?>" style="font-size: 21px;"><i class="fa fa-shopping-cart"></i></a> <?=$resulitems1['valor_venda']?></p>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Descrição<i class="fa fa-close right"></i></span>
                <p><b><?=$resulitems1['nome_produto']?></b></p>
                <p><?=$resulitems1['descricao']?></p>
                <p><b class="">Preço:</b> <?=$resulitems1['valor_venda']?> KZ</p>
              </div>
            </div>
          </div>



        <?php
      }}
          else {
        $sqlitems1 = "SELECT * FROM tb_produto ORDER BY nome_produto ASC";
        $dadositems1 = mysqli_query($conexao, $sqlitems1);
          while($resulitems1 = mysqli_fetch_assoc($dadositems1)) {
          ?>
          <div class="col s6 m4 l3">
            <div class="card">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="imagens/<?=$resulitems1['imagem_produto']?>">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4"><?=$resulitems1['nome_produto']?><i class="fa fa-info-circle right" style=""></i></span>
                <p><a href="carrinho.php?acao=add&id=<?=$resulitems1['id_produto']?>" style="font-size: 21px;"><i class="fa fa-shopping-cart"></i></a> <?=$resulitems1['valor_venda']?></p>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Descrição<i class="fa fa-close right"></i></span>
                <p><b><?=$resulitems1['nome_produto']?></b></p>
                <p><?=$resulitems1['descricao']?></p>
                <p><b class="">Preço:</b> <?=$resulitems1['valor_venda']?> KZ</p>
              </div>
            </div>
          </div>
          <?php
        }}
        ?>
        <div class="col s6 m4 l3" hidden>
          <div class="card large">
            <div class="card-image">
              <img src="imagens/13.png">
              <span class="card-title">Card Title</span>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>
        <div class="col s6 m4 l3" hidden>
          <div class="card">
            <div class="card-image">
              <img src="imagens/tennis3.png">
              <span class="card-title">Card Title</span>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
              </div>
              <div class="card-action">
                <a href="#">Add carrinho</a>
              </div>
            </div>
          </div>
        </div>
      </div>
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
