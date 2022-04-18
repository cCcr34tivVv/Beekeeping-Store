<?php   
    include ('partials/header.php');
?>

<?php   
     include ('partials/menu.php');
?>


<div class="title-page">
    <h1>Detalii cont</h1>
</div> 
    
<div class="show-account">
    <h1>Informatii cont</h1>
    <br>
    <?php
                    if(isset($_SESSION['update1']))
                    {
                        //display session message
                        echo $_SESSION['update1'];
                        //remove session message
                        unset($_SESSION['update1']);
                    }
    
                    if(isset($_SESSION['update2']))
                    {
                        //display session message
                        echo $_SESSION['update2'];
                        //remove session message
                        unset($_SESSION['update2']);
                    }
            
            ?>
    <table class="tb-full">
        <tr>
            <th>Id</th>
            <th>Nume utilizator</th>
            <th>Parola</th>
            <th>Furnizor</th>
        </tr>
        
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
                
                $id=$row['ID_CONT'];
                $username=$row['NUME_UTILIZATOR'];
                $password=md5($row['PAROLA']);
                $provider=$row['ESTI_FURNIZOR'];
                
                //convertim 0 in nu si 1 in da pentru furnizor
                if($provider==0)
                    $provider_bun="nu";
                else
                    $provider_bun="nu";
                ?>
                
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $password; ?></td>
                    <td><?php echo $provider_bun; ?></td>
                </tr>

           
           <?php
            }
            else
            {
                //nu avem date in baza de date
            }
        ?>
        
        
    </table>
    
    
    <h1>Informatii persoana</h1>
    <br>
    <table class="tb-full">
        <tr>
            <th>Nume</th>
            <th>Prenume</th>
            <th>Data nastere</th>
            <th>Oras</th>
            <th>Strada</th>
            <th>Numar</th>
            <th>Scara</th>
            <th>Apartament</th>
            <th>Nr. telefon</th>
            <th>email</th>
        </tr>
        
        <?php
        
            $id_cont=$_SESSION['id_cont'];
            //echo $id_cont;
        
            $sql1="SELECT * FROM detalii_oameni WHERE oameni_id_cont='$id_cont'";
            $res=oci_parse($conn, $sql1) ;
            oci_execute($res);
        
            //verific daca interogarea este executata
            if($res==TRUE)
            {
                $row=oci_fetch_assoc($res);
                
                $last_name=$row['NUME'];
                $first_name=$row['PRENUME'];
                $date_of_birth=$row['DATA_NASTERE'];
                $city=$row['ORAS'];
                $street=$row['STRADA'];
                $number=$row['NUMAR'];
                $entrance=$row['SCARA'];
                $apartment=$row['APARTAMENT'];
                $phone_number=$row['NUMAR_TELEFON'];
                $email=$row['EMAIL'];
                

                ?>
                
                <tr>
                    <td><?php echo $last_name; ?></td>
                    <td><?php echo $first_name; ?></td>
                    <td><?php echo $date_of_birth; ?></td>
                    <td><?php echo $city; ?></td>
                    <td><?php echo $street; ?></td>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $entrance; ?></td>
                    <td><?php echo $apartment; ?></td>
                    <td><?php echo $phone_number; ?></td>
                    <td><?php echo $email; ?></td>
                </tr>

           
           <?php
            }
            else
            {
                //nu avem inregistrarea in baza de date
                //echo "nu este inregistrare";
            }
        ?>
        
        
    </table>
    
    <form class="input-form" action="modificare_date.php" method="post" onkeydown="return event.key != 'Enter';">
                <button class="input-button" type="submit" name="submit4">Modificare date</button>
    </form>
    
</div>   

    
<?php   
     include ('partials/footer.php');
?> 