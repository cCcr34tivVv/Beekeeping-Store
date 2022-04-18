<?php include('config/constants.php') ?> 

<?php
   /* $db = "(DESCRIPTION =
        (ADDRESS = (PROTOCOL = TCP)(HOST = bd-dc.cs.tuiasi.ro)(PORT = 1539))
        (CONNECT_DATA =
          (SERVER = DEDICATED)
          (SERVICE_NAME = orcl)
        )
      )" ;*/

    //procesez datele din form si le pun in baza de date
    
    //verific daca butonul este apasat
    //if(isset($_POST['submit']))
    //{
    //    echo "buton apasat!";
    //}

    /////////////////
    //autentificare//
    /////////////////
    if(isset($_POST['submit1']))
    {
    //inca nu merge
    
        //iau datele din form
        $username=$_POST['username'];
        //echo "$username" . "<br>";
        $password=md5($_POST['password']);
        //echo "$password" . "<br>";
        
        $sql="SELECT id_cont FROM oameni WHERE " .
            "nume_utilizator='$username' AND parola='$password'";
        
        //echo $sql;
        
        $res1=oci_parse($conn, $sql) or die(oci_error());
        
        oci_execute($res1);
        
        if(is_resource($res1))
        {
            $ceva=oci_fetch_array($res1);
            $id_cont=($ceva['ID_CONT']);
            //echo $id_cont_bun . "<br>";
        }
        
        $_SESSION['id_cont']=$id_cont;
        $_SESSION['utilizator']=$username;
        
        //echo $id_cont;
    
        if($id_cont!=0){
            //echo "Data selected 1";
            //create a seesion variable to display a message
            $_SESSION['login']="Autentificare reusita" . "<br>";
            //redirect page
            header("location:".SITEURL.'contul_meu.php');
        }
        else{
            //echo "Data not selected 1";
            //create a seesion variable to display a message
            $_SESSION['login']="Autentificare nereusita";
            //redirect page
            header("location:".SITEURL.'contul_meu.php');
        }
    }

    ////////////////
    //detalii cont//
    ////////////////
    if(isset($_POST['submit2']))
    {
    //merge    
    
        /*
        //iau datele din form
        $username=$_POST['username'];
        //echo "$username" . "<br>";
        $password=md5($_POST['password']);
        //echo "$password" . "<br>";
        
        $sql="SELECT id_cont FROM oameni WHERE " .
            "nume_utilizator='$username' AND parola='$password'";
        
        //echo $sql;
        
        $res1=oci_parse($conn, $sql) or die(oci_error());
        oci_execute($res1);
        
        if(is_resource($res1))
        {
            $ceva=oci_fetch_array($res1);
            $id_cont=($ceva['ID_CONT']);
            //echo $id_cont_bun . "<br>";
        }
        
        //echo $id_cont;
        
        */
        
        $id_cont=$_SESSION['id_cont'];
        //if($res1==TRUE){
            if($id_cont!=0)
            {
                //echo "Data selected 1";
                //create a seesion variable to display a message
                $_SESSION['select1']="selected from oameni" . "<br>";
                //$_SESSION['id_cont']=$id_cont;
                //redirect page
                header("location:".SITEURL.'detalii_cont.php');
            }
            //else
            //{
                //header("location:".SITEURL.'contul_meu.php');
                //$_SESSION['ceva_gresit']="Nume utilizator sau parola gresite!";
            //}
        //}
        else{
            //echo "Data not selected 1";
            //create a seesion variable to display a message
            $_SESSION['select1']="not selected from oameni";
            //redirect page
            header("location:".SITEURL.'contul_meu.php');
        }
        
    }


    ////////////////////
    //schimbare parola//
    ////////////////////

    if(isset($_POST['password1']))
    {
        //echo "btn clicked";
        //iau datele din form
        $username=$_POST['username'];
        //echo "$username" . "<br>";
        
        $sql="SELECT id_cont FROM oameni WHERE " .
            "nume_utilizator='$username'";
        
        //echo $sql;
        
        $res1=oci_parse($conn, $sql) or die(oci_error());
        oci_execute($res1);
        
        if(is_resource($res1))
        {
            $ceva=oci_fetch_array($res1);
            $id_cont=($ceva['ID_CONT']);
            //echo $id_cont_bun . "<br>";
        }
        
        //echo $id_cont;
        
        if($res1==TRUE){
            if($id_cont!=0)
            {
                //echo "Data selected 1";
                //create a seesion variable to display a message
                $_SESSION['select1']="selected from oameni" . "<br>";
                $_SESSION['id_cont']=$id_cont;
                //redirect page
                header("location:".SITEURL.'schimba_parola.php');
            }
            else
            {
                header("location:".SITEURL.'contul_meu.php');
                $_SESSION['ceva_gresit']="Nume utilizator gresit !";
            }
        }
        else{
            //echo "Data not selected 1";
            //create a seesion variable to display a message
            $_SESSION['select1']="not selected from oameni";
            //redirect page
            header("location:".SITEURL.'contul_meu.php');
        }
    }

    ///////////////
    //deconectare//
    ///////////////

    if(isset($_POST['logout']))
    {
        session_destroy();
        header("location:".SITEURL.'contul_meu.php');    
    }
?>