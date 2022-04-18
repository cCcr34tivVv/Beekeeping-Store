<?php include('config/constants.php') ?> 

<?php
    /////////////////////
    //modificare parola//
    /////////////////////
    if(isset($_POST['modify2']))
    {
        //merge
        $id_cont=$_SESSION['id_cont'];
        //echo $id_cont;
        
        $new_password=md5($_POST['new_password']);
        $confirm_password=md5($_POST['confirm_password']);
        
        if($new_password==$confirm_password){
            //parolele se potrivesc deci putem sa o schimbam
            $sql="UPDATE oameni SET parola='$new_password' WHERE id_cont=$id_cont";
            $res1=oci_parse($conn, $sql) or die(oci_error());
            oci_execute($res1);
            
            //echo $sql;
            
            if($res1==TRUE){
                //echo "Password changed";
                //create a seesion variable to display a message
                $_SESSION['change_password']="Parola schimbata cu succes";
                //redirect page
                header("location:".SITEURL.'contul_meu.php');
            }
            else{
                //echo "Data not inserted 2";
                //create a seesion variable to display a message
                $_SESSION['change_password']="Parola nu a fost schimbata cu succes";
                //redirect page
                header("location:".SITEURL.'contul_meu.php');
            }
            
        }
        else{
            //parolele nu se potrivesc
            $_SESSION['password']="Parolele nu se potrivesc!";
            header("location:".SITEURL.'schimba_parola.php');
        }
    }

?>