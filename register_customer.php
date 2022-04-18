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

    ////////////////
    //inregistrare//
    ////////////////
    if(isset($_POST['submit3']))
    {
    //merge
    
        //iau datele din form
        $username=$_POST['username'];
        //echo "$username" . " " .gettype($username) ."<br>";
        $password=md5($_POST['password']);
        //echo "$password" . " " .gettype($password) ."<br>";
        $provider=$_POST['provider'];
        //echo "$provider". " " .gettype($provider) ."<br>";
        $last_name=$_POST['last_name'];
        //echo "$last_name". " " .gettype($last_name) ."<br>";
        $first_name=$_POST['first_name'];
        //echo "$first_name". " " .gettype($first_name) ."<br>";
        $date_of_birth=$_POST['date_of_birth'];
        //echo "$date_of_birth". " " .gettype($date_of_birth) ."<br>";
        $city=$_POST['city'];
        //echo "$city". " " .gettype($city) ."<br>";
        $number=$_POST['number'];
        //echo "$number". " " .gettype($number) ."<br>";
        $street=$_POST['street'];
        //echo "$street". " " .gettype($street) ."<br>";
        $entrance=$_POST['entrance'];
        //echo "$entrance". " " .gettype($entrance) ."<br>";
        $apartment=$_POST['apartment'];
        //echo "$apartment". " " .gettype($apartment) ."<br>";
        $phone_number=$_POST['phone_number'];
        //echo "$phone_number". " " .gettype($phone_number) ."<br>";
        $email=$_POST['email'];
        //echo "$email". " " .gettype($email) ."<br>";;


        //interogare sql pentru a salva datele in baza de date
        $sql1 = "INSERT INTO oameni (NUME_UTILIZATOR, PAROLA, ESTI_FURNIZOR)" . 
                "VALUES ('$username', '$password', '$provider')";

        //excecut interogarea si salvez datele in baza de date

        //conexiune baza de date
        //$conn = oci_connect('bd149','Stef10012000',$db) or die(oci_error());
        //$db_select = oci_select_db( 'bd149') or die(oci_error());

        $res1=oci_parse($conn, $sql1) or die(oci_error());

        /*
        oci_bind_by_name($res1, ':usr', $username);
        oci_bind_by_name($res1, ':psw', $password);
        oci_bind_by_name($res1, ':prv', $provider);
        */

        if($res1==TRUE){
            echo "Data inserted 1";
            //create a seesion variable to display a message
            $_SESSION['add1']="inserted into oameni" . "<br>";
            //redirect page
            //header("location:".SITEURL.'contul_meu.php');
        }
        else{
            echo "Data not inserted 1";
            //create a seesion variable to display a message
            $_SESSION['add1']="not inserted into oameni";
            //redirect page
            //header("location:".SITEURL.'contul_meu.php');
        }

        oci_execute($res1);

        //alegere id 
        $sql3="SELECT ID_CONT FROM oameni WHERE NUME_UTILIZATOR='$username'";
        $id_cont=oci_parse($conn, $sql3);
        oci_execute($id_cont);

        if(is_resource($id_cont))
        {
            $ceva=oci_fetch_array($id_cont);
            $id_cont_bun=($ceva['ID_CONT']);
            //echo $id_cont_bun . "<br>";
        }

        //transformare format data din yyyy-mm-dd in dd-mm-yyyy
        $newDate = date("d-m-Y", strtotime($date_of_birth));
        //echo $newDate;

        //transformare luna din numar in luna de tip 3 carac : 01-01-2000 --> 01-JAN-2000
        $time=strtotime($newDate);
        $month=date("n",$time);
        $year=date("Y",$time);
        $day=date("d",$time);

        $monthName = date('M', mktime(0, 0, 0, $month, 10));

        $date_good_format=$day . '-' . $monthName . '-' . $year;

        //echo $date_good_format;

        $number=intval($number);
        $apartment=intval($apartment);
        $id_cont_bun=intval($id_cont_bun);

        //echo gettype($id_cont_bun);

        $sql2 = "INSERT INTO detalii_oameni (NUME, PRENUME, DATA_NASTERE, ORAS, STRADA, NUMAR, SCARA, ". 
                "APARTAMENT, NUMAR_TELEFON, OAMENI_ID_CONT, EMAIL)".
                "VALUES ('$last_name', '$first_name', '$date_good_format', '$city',".
                "  '$street', '$number', '$entrance', '$apartment', '$phone_number', '$id_cont_bun',". 
                " '$email')";
        
        //echo "<br>" . $sql2;

        //excecut interogarea si salvez datele in baza de date

        //conexiune baza de date
        //$conn = oci_connect('bd149','Stef10012000',$db) or die(oci_error());
        //$db_select = oci_select_db( 'bd149') or die(oci_error());

        $res2=oci_parse($conn, $sql2) or die(oci_error());

    /*
        oci_bind_by_name($res2, ':lnm', $last_name);
        oci_bind_by_name($res2, ':fnm', $first_name);
        oci_bind_by_name($res2, ':dob', $date_good_format);
        oci_bind_by_name($res2, ':cty', $city);
        oci_bind_by_name($res2, ':nbr', $number , OCI_B_INT);
        oci_bind_by_name($res2, ':str', $street);
        oci_bind_by_name($res2, ':ent', $entrance);
        oci_bind_by_name($res2, ':apt', $apartment, OCI_B_INT);
        oci_bind_by_name($res2, ':pnr', $phone_number);
        oci_bind_by_name($res2, ':oid', $id_cont_bun ,OCI_B_INT);
        oci_bind_by_name($res2, ':eml', $email);
    */
        if($res2==TRUE){
            echo "Data inserted 2";
            //create a seesion variable to display a message
            $_SESSION['add2']="inserted into detalii_oameni" . "<br>";
            //redirect page
            header("location:".SITEURL.'contul_meu.php');
        }
        else{
            echo "Data not inserted 2";
            //create a seesion variable to display a message
            $_SESSION['add2']="inserted into detalii_oameni";
            //redirect page
            header("location:".SITEURL.'contul_meu.php');
        }

        oci_execute($res2);
    }
?>