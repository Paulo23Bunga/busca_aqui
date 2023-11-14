<nav class="white" role="navigation">
  <div id="pic" class="">
   <div class="nav-wrapper container">
     <a id="logo-container" href="app.php" class="brand-logo"><img class="" src="pic/c6.jpg"></a>
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
