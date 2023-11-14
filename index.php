<?php
session_start();

$conexao = mysqli_connect('localhost','root','','weka_commerce');
mysqli_set_charset($conexao, "utf8");

    if (mysqli_connect_errno($conexao)) {
    echo "Problemas para conectar no banco. Verifique os dados!";
    die();
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Carrinho de compras</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="principal_style.css">
  <style>

  </style>
</head>
<body id="inicio" class="">

   <h1 class="search-txt1" id="search-txt1"><img src="./img/buscaaki_logo (1).png" style="max-width: 400px; height: 100px;"></h1>
   <div class="search-box" hidden>
   	 <input type="text" class="search-txt" placeholder="Pesquisar">
   	 <a href="app.php" class="search-btn" id="pesquisa">
   	 	 <img src="img/loupe.png"alt="Lupa"height ="20" width="20">
   	 </a>
   </div>
   <form class="" action="index.php" method="post">
     <div class="search-box">
     	 <input type="text" class="search-txt" name="txtpesp" id="txtpesp" placeholder="Pesquisar">
     	 <button type="submit" class="search-btn" id="btn_pesqu" name="btn_pesqu">
     	 	 <img src="img/loupe.png"alt="Lupa"height ="20" width="20">
     	 </button>
     </div>
   </form>
     <div id="listasms" class="collection container" style="position: absolute; left: 40%; top: 38vh; width: 300px; max-height: 60vh !important; overflow-y: auto !important;">

     </div>
</body>
    <!--  Scripts-->
  <script src="js/jQuery-3.6.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script type="text/javascript">
  /**Prucurar**/
$("#txtpesp").on("input", function(){
     let dadosPesquisa = $(this).val();
     if(dadosPesquisa == '') return;
  //   alert(dadosPesquisa);
    // console.log(dadosPesquisa);
    $.post("pesquisa.php",
     {
         key: dadosPesquisa
     },
     function(data, status){
         $("#listasms").html(data);
     }
   );
})

/**Clicado**/
/*
$("#btn_pesqu").on("click", function(event){
    // event.preventDefault();
     let dadosPesquisa = $("#txtpesp").val();
     if(dadosPesquisa == "") return;
    // console.log(dadosPesquisa);
    //alert("Ola")
    $.post("pesquisa.php",
     {
         play: dadosPesquisa
     },
     function(data, status){
         $("#listasms").html(data);
     }
    );

})
*/
  </script>

</html>
