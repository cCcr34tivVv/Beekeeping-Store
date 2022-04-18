<?php   
    include ('partials/header.php');
?>

<?php   
     include ('partials/menu.php');
?>

<div class="title-page">
    <h1>Modificare parola</h1>
</div>
   
    
    
    <?php
        $id_cont=$_SESSION['id_cont'];
        //echo $id_cont;
        
        $sql="SELECT * FROM oameni WHERE id_cont='$id_cont'";
        $res=oci_parse($conn, $sql) ;
        oci_execute($res);
        
        //verific daca interogarea este executata
        if($res==TRUE)
        {
            $row=oci_fetch_assoc($res);
                
            $password=$row['PAROLA'];
            //echo $password;
        }
        else
        {
                //nu avem date in baza de date
        }

    ?>
    
<div class="content">
   <div class="text-centered">
    <h1>Introduceti noua parola</h1>
   
   <br>
        <?php
                if(isset($_SESSION['password']))
                {
                    //display session message
                    echo $_SESSION['password'];
                    //remove session message
                    unset($_SESSION['password']);
                }
            
        ?> 
    <form class="input-form" action="modify_password.php" method="post" onkeydown="return event.key != 'Enter';">
        <div class="label_input">
            <label for="new_password">Noua parola:</label>
                <input class="input-box" type="password" name="new_password" placeholder="Noua parola" >
        </div>
        <div class="label_input">
            <label for="confirm_password">Confirma parola:</label>
                <input class="input-box" type="password" name="confirm_password" placeholder="Confirma parola">
        </div>
            <button class="input-button" type="submit" name="modify2">Modifica parola</button>
    </form>
    
    </div>
</div>
    
<?php   
     include ('partials/footer.php');
?> 


