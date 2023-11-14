<?php
session_start();
//echo "chegou";
$conexao = mysqli_connect('localhost','root','','weka_commerce');
mysqli_set_charset($conexao, "utf8");

if (mysqli_connect_errno($conexao)) {
  echo "Problemas para conectar no banco. Verifique os dados!";
  die();
}



if(isset($_POST['key'])){
   $texto = $_POST['key'];
  $sqlCategoria = "SELECT * FROM tb_produto WHERE nome_produto LIKE  '%$texto%'";
  $resulCategoria = mysqli_query($conexao, $sqlCategoria);
  // $tarefas = array();

  if(mysqli_num_rows($resulCategoria) > 0){
    while ($categoria = mysqli_fetch_assoc($resulCategoria)) {
      echo "


      <a href='app.php?peqsID=$categoria[id_produto]' class='collection-item'>
      <img src='imagens/$categoria[imagem_produto]' style='width: 50px; height: 50px; border-radius: 100%;'>
      <span class='badge'>$categoria[valor_venda]</span>$categoria[nome_produto]</a>



      ";
    }
  } else{
    echo "
    <h1 class='py-5 text-center'>Dados da pesquisa não encotrado</h1>
    ";
  }
}
/*
if(isset($_POST['btn_pesqu'])){
   $texto = $_POST['txtpesp'];
  $sqlCategoria = "SELECT * FROM tb_produto WHERE nome_produto LIKE  '%$texto%'";
  $resulCategoria = mysqli_query($conexao, $sqlCategoria);
  // $tarefas = array();

  if(mysqli_num_rows($resulCategoria) > 0){
    while ($categoria = mysqli_fetch_assoc($resulCategoria)) {
      echo "


      <a href='app.php?peqsID=$categoria[id_produto]' class='collection-item'>
      <img src='imagens/$categoria[imagem_produto]' style='width: 50px; height: 50px; border-radius: 100%;'>
      <span class='badge'>$categoria[valor_venda]</span>$categoria[nome_produto]</a>

      ";
    }
  } else{
    echo "
    <script>alert('ola')</script>
    <h1 class='py-5 text-center'>Dados da pesquisa não encotrado</h1>
    ";
  }
//  header('Location: aindex.php');
} */

?>
