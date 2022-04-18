<?php   
    include ('partials/header.php');
?>

<?php   
     include ('partials/menu.php');
?>

<div class="title-page">
    <h1>Modificare date</h1>
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
                
            $username=$row['NUME_UTILIZATOR'];
            $provider=$row['ESTI_FURNIZOR'];
        }
        else
        {
                //nu avem date in baza de date
        }

        $sql="SELECT * FROM detalii_oameni WHERE oameni_id_cont='$id_cont'";
        $res=oci_parse($conn, $sql) ;
        oci_execute($res);
        
        //verific daca interogarea este executata
        if($res==TRUE)
        {
            $row=oci_fetch_assoc($res);
                
            $last_name=$row['NUME'];
            $first_name=$row['PRENUME'];
            $city=$row['ORAS'];
            $street=$row['STRADA'];
            $number=$row['NUMAR'];
            $entrance=$row['SCARA'];
            $apartment=$row['APARTAMENT'];
            $phone_number=$row['NUMAR_TELEFON'];
            $email=$row['EMAIL'];
               
        }
        else
        {
                //nu avem date in baza de date
        }
    ?>
    
<div class="content">
    <form class="input-form" action="update_customer.php" method="post" onkeydown="return event.key != 'Enter';">
        <div class="label_input">
            <label for="username">Nume utilizator:</label>
                <input class="input-box" type="text" name="username" placeholder="Nume utilizator" 
                value="<?php echo $username; ?>">
        </div>
        <div class="label_input">
            <label for="provider">Esti furnizor? 1-da / 0-nu:</label>
                <input class="input-box" type="number" name="provider" placeholder="Esti furnizor? 1-da / 0-nu"
                value="<?php echo $provider; ?>">
        </div>
        <div class="label_input">
            <label for="last_name">Nume:</label>       
                <input class="input-box" type="text" name="last_name" placeholder="Nume" 
                value="<?php echo $last_name; ?>">
        </div>
        <div class="label_input">
            <label for="first_name">Prenume:</label>        
               <input class="input-box" type="text" name="first_name" placeholder="Prenume" 
                value="<?php echo $first_name; ?>">
        </div>
        <div class="label_input">
            <label for="city">Oras:</label>
                <input class="input-box" type="text" name="city" placeholder="Oras" 
                value="<?php echo $city; ?>">
        </div>
        <div class="label_input">
            <label for="street">Strada:</label>
                <input class="input-box" type="text" name="street" placeholder="Strada" 
                value="<?php echo $street; ?>">
        </div>
        <div class="label_input">
            <label for="number">Numar:</label>
                <input class="input-box" type="number" name="number" placeholder="Numar" 
                value="<?php echo $number; ?>">
        </div>
        <div class="label_input">
            <label for="entrance">Scara:</label>
                <input class="input-box" type="text" name="entrance" placeholder="Scara" 
                value="<?php echo $entrance; ?>">
        </div>
        <div class="label_input">
            <label for="apartment">Apartament:</label>
                <input class="input-box" type="number" name="apartment" placeholder="Apartament" 
                value="<?php echo $apartment; ?>">
        </div>
        <div class="label_input">
            <label for="phone_number">Numar de telefon:</label>
                <input class="input-box" type="text" name="phone_number" placeholder="Numar de telefon" 
                value="<?php echo $phone_number; ?>">
        </div>
        <div class="label_input">
            <label for="email">Email:</label>
                <input class="input-box" type="email" name="email" placeholder="Email" 
                value="<?php echo $email; ?>">
        </div>
                <button class="input-button" type="submit" name="modify1">Modificare</button>
            </form>
</div>
    
<?php   
     include ('partials/footer.php');
?> 