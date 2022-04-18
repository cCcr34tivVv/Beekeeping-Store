<?php include('config/constants.php') ?> 
  
   <body>
    <div class="menu text-center">
        <div class="wrapper">
            <ul>
                <li><a href="index.php">Acasa</a></li>
                <li><a href="cum_comand.php">Cum comand</a></li>
                <li><a href="plata_livrare.php">Plata si livrarea</a></li>
                <li><a href="articole.php">Articole apicultura</a></li>
                <li><a href="contul_meu.php">Contul meu</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="cos.php">Cosul meu</a></li>
                <label class="utiliz_cont">Utilizator : 
                   <?php 
                        if(isset($_SESSION['utilizator']))
                        {
                            //display session message
                            echo $_SESSION['utilizator'];
                        }
                    ?>
                    </label>
                
            </ul>
        </div>
    </div>