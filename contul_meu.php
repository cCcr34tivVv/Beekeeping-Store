<?php   
    include ('partials/header.php');
?>

<?php   
     include ('partials/menu.php');
?>
    
<div class="title-page">
    <h1>Contul meu</h1>
</div>    
    
<div class="content">
             
        <div class="col-2 text-center">
            <h2>Autentificare</h2>
            
            <br>
            <?php
                    if(isset($_SESSION['select1']))
                    {
                        //display session message
                        echo $_SESSION['select1'];
                        //remove session message
                        unset($_SESSION['select1']);
                    }
            
                    if(isset($_SESSION['ceva_gresit']))
                    {
                        //display session message
                        echo $_SESSION['ceva_gresit'];
                        //remove session message
                        unset($_SESSION['ceva_gresit']);
                    }
            
                    if(isset($_SESSION['change_password']))
                    {
                        //display session message
                        echo $_SESSION['change_password'];
                        //remove session message
                        unset($_SESSION['change_password']);
                    }
            
                    if(isset($_SESSION['login']))
                    {
                        //display session message
                        echo $_SESSION['login'];
                        //remove session message
                        unset($_SESSION['login']);
                    }
            
                    if(isset($_SESSION['customer']))
                    {
                        //display session message
                        echo $_SESSION['customer'];
                        //remove session message
                        unset($_SESSION['customer']);
                    }
            
            ?>
            
            <form class="input-form" action="login_customer.php" method="post" onkeydown="return event.key != 'Enter';">
               <div class="label_input">
               <label for="username">Nume utilizator:</label>
               <input class="input-box" type="text" name="username" placeholder="Nume utilizator">
               </div>
               <div class="label_input">
               <label for="password">Parola:</label>
                <input class="input-box" type="password" name="password" placeholder="Parola">
                </div>
                <button class="input-button" type="submit" name="submit1">Autentificare</button>
                <button class="input-button" type="submit" name="logout">Deconectare</button>
                <button class="input-button" type="submit" name="submit2">Detalii cont</button>
                <button class="input-button" type="submit" name="password1">Am uitat parola</button>
            </form>
            
            
        </div>   
         
        <div class="col-2 text-center">
            <h2>Inregistrare</h2>
            
            <br>
               <?php
                    if(isset($_SESSION['add1']))
                    {
                        //display session message
                        echo $_SESSION['add1'];
                        //remove session message
                        unset($_SESSION['add1']);
                    }
                ?>
                <br>
               
                <?php
                    if(isset($_SESSION['add2']))
                    {
                        //display session message
                        echo $_SESSION['add2'];
                        //remove session message
                        unset($_SESSION['add2']);
                    }
                ?>
            
            <form class="input-form" action="register_customer.php" method="post" 
              onkeydown="return event.key != 'Enter';">
               <div class="label_input">
               <label for="username">Nume utilizator:</label>
                <input class="input-box" type="text" name="username" placeholder="Nume utilizator">
                </div>
                <div class="label_input">
               <label for="password">Parola:</label>
                <input class="input-box" type="password" name="password" placeholder="Parola">
                </div>
                <div class="label_input">
               <label for="provider">Esti furnizor? 1-da / 0-nu:</label>
                <input class="input-box" type="number" name="provider" placeholder="Esti furnizor? 1-da / 0-nu">
                </div>
                <div class="label_input">
               <label for="last_name">Nume:</label>
                <input class="input-box" type="text" name="last_name" placeholder="Nume">
                </div>
                <div class="label_input">
               <label for="first_name">Prenume:</label>
                <input class="input-box" type="text" name="first_name" placeholder="Prenume">
                </div>
                <div class="label_input">
               <label for="date_of_birth">Data de nastere:</label>
                <input class="input-box" type="date" name="date_of_birth" placeholder="Data de nastere">
                </div>
                <div class="label_input">
               <label for="city">Oras:</label>
                <input class="input-box" type="text" name="city" placeholder="Oras">
                </div>
                <div class="label_input">
               <label for="street">Strada:</label>
                <input class="input-box" type="text" name="street" placeholder="Strada">
                </div>
                <div class="label_input">
               <label for="number">Numar:</label>
                <input class="input-box" type="number" name="number" placeholder="Numar">
                </div>
                <div class="label_input">
               <label for="entrance">Scara:</label>
                <input class="input-box" type="text" name="entrance" placeholder="Scara">
                </div>
                <div class="label_input">
               <label for="apartment">Apartament:</label>
                <input class="input-box" type="number" name="apartment" placeholder="Apartament">
                </div>
                <div class="label_input">
               <label for="phone_number">Numar de telefon:</label>
                <input class="input-box" type="text" name="phone_number" placeholder="Numar de telefon">
                </div>
                <div class="label_input">
               <label for="email">Email:</label>
                <input class="input-box" type="email" name="email" placeholder="Email">
                </div>
                <button class="input-button" type="submit" name="submit3">Inregistrare</button>
            </form>
        </div>  
                              
        <div class="clearfix"></div>          
</div>
   
    
<?php   
     include ('partials/footer.php');
?> 
