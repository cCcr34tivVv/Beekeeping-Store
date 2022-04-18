<?php include('config/constants.php') ?> 

<?php
    ///////////////////
    //modificare date//
    ///////////////////
    if(isset($_POST['modify1']))
    {
        //merge
        $id_cont=$_SESSION['id_cont'];
        //echo $id_cont;
        $username=$_POST['username'];
        //echo "$username" . " " .gettype($username) ."<br>";
        $provider=$_POST['provider'];
        //echo "$provider". " " .gettype($provider) ."<br>";
        $last_name=$_POST['last_name'];
        //echo "$last_name". " " .gettype($last_name) ."<br>";
        $first_name=$_POST['first_name'];
        //echo "$first_name". " " .gettype($first_name) ."<br>";
        $city=$_POST['city'];
        //echo "$city". " " .gettype($city) ."<br>";
        $street=$_POST['street'];
        //echo "$street". " " .gettype($street) ."<br>";
        $number=$_POST['number'];
        //echo "$number". " " .gettype($number) ."<br>";
        $entrance=$_POST['entrance'];
        //echo "$entrance". " " .gettype($entrance) ."<br>";
        $apartment=$_POST['apartment'];
        //echo "$apartment". " " .gettype($apartment) ."<br>";
        $phone_number=$_POST['phone_number'];
        //echo "$phone_number". " " .gettype($phone_number) ."<br>";
        $email=$_POST['email'];
        //echo "$email". " " .gettype($email) ."<br>";;

        //echo"btnc";

        $sql="UPDATE oameni SET ".
            "NUME_UTILIZATOR='$username',".
            "ESTI_FURNIZOR='$provider'".
            "WHERE ID_CONT='$id_cont'";
        $res1=oci_parse($conn, $sql) or die(oci_error());
        oci_execute($res1);


        $sql1="UPDATE detalii_oameni SET ".
            "NUME='$last_name',".
            "PRENUME='$first_name',".
            "ORAS='$city',".
            "STRADA='$street',".
            "NUMAR='$number',".
            "SCARA='$entrance',".
            "APARTAMENT='$apartment',".
            "NUMAR_TELEFON='$phone_number',".
            "EMAIL='$email'".
            "WHERE OAMENI_ID_CONT='$id_cont'";

        $res2=oci_parse($conn, $sql1) or die(oci_error());
        oci_execute($res2);

        if($res1==TRUE){
                echo "Data updated 1";
                //create a seesion variable to display a message
                $_SESSION['update1']="updated oameni" . "<br>";
                //redirect page
                //header("location:".SITEURL.'detalii_cont.php');
            }
            else{
                //echo "Data not selected 1";
                //create a seesion variable to display a message
                $_SESSION['update1']="not updated oameni";
                //redirect page
                //header("location:".SITEURL.'contul_meu.php');
            }

        if($res2==TRUE){
                echo "Data updated 2";
                //create a seesion variable to display a message
                $_SESSION['update2']="updated detalii_oameni" . "<br>";
                //redirect page
                //header("location:".SITEURL.'detalii_cont.php');
            }
            else{
                //echo "Data not selected 1";
                //create a seesion variable to display a message
                $_SESSION['update2']="not updated oameni";
                //redirect page
                //header("location:".SITEURL.'contul_meu.php');
            }

        if($res1==TRUE && $res2==TRUE)
        {
            header("location:".SITEURL.'detalii_cont.php');
        }
    }
?>
    