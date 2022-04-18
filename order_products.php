<?php include('config/constants.php') ?> 


<?php
    if(isset($_POST['order']))
    {
        //echo "buton apasat";
        //apasam pe butonul cumpara produsele
        
        $id_cont=$_SESSION['id_cont'];
        
        $sql="INSERT INTO comanda (DATA_COMANDA, OAMENI_ID_CONT) VALUES (SYSDATE,'$id_cont') ";
        $res=oci_parse($conn, $sql) or die(oci_error());
        oci_execute($res);
        
        if($res==TRUE)
        {
            //echo "Inserted comanda successfully" . "<br>";
        }
        
        $variabila=-1;

        //tin minte cantitatea
        $cantitate=array();

        if(isset($_SESSION['qnt'])){
            foreach($_SESSION['qnt'] as $key => $value)
            {
                foreach($value as $key1 => $value1)
                {
                    array_push($cantitate, $value1);
                }
            }
        }
        
        /*
        foreach($cantitate as $key)
        {
            echo $key . " ";
        }
        */
        
        //iau id ul din tablea comanda
        $sql="SELECT max(id_comanda) FROM comanda";
        $res=oci_parse($conn, $sql) or die(oci_error());
        oci_execute($res);
        
        if($res==TRUE)
        {
            //echo "SELECT id successfully" . "<br>";
        
            if(is_resource($res))
            {
                $ceva=oci_fetch_array($res);
                $id_comanda=($ceva['MAX(ID_COMANDA)']);
                //echo $id_cont_bun . "<br>";
            }
        }
        
        
        //echo $id_comanda;
        
        //tin minte id_produs
        if(isset($_SESSION['cart'])){
        //$count= count($_SESSION['cart']);
        //echo $count;
    
            foreach($_SESSION['cart'] as $key => $value)
            {
                foreach($value as $key1 => $value1)
                {
                    //print_r( $value1);

                    $variabila++;

                    //var pt poza (deocamdata)
                    $id_produs=$value1;
                    //echo $id_produs;

                    $qnt=$cantitate[$variabila];

                    $sql="INSERT INTO produs_comandat VALUES ('$qnt','$id_comanda','$id_produs')";
                    $res=oci_parse($conn, $sql) or die(oci_error());
                    oci_execute($res);    

                    if($res==TRUE)
                    {
                        //echo "Inserted produs_comandat successfully" . "<br>";
                    }    

                    $sql="UPDATE produse SET STOC=STOC-$qnt WHERE ID_PRODUS='$id_produs'";
                    $res=oci_parse($conn, $sql) or die(oci_error());
                    oci_execute($res);    

                    if($res==TRUE)
                    {
                        //echo "Updated successfully" . "<br>";
                    }

                    //daca stocul scade sub 5 unitati furnizorul va aduce produsele necesare pentru a avea uns toc de 50 de //produse

                    $sql="SELECT stoc FROM produse WHERE ID_PRODUS='$id_produs'";
                    $res=oci_parse($conn, $sql) or die(oci_error());
                    oci_execute($res);    

                    if($res==TRUE)
                    {
                        if(is_resource($res))
                        {
                            $ceva=oci_fetch_array($res);
                            $stoc_produs=($ceva['STOC']);
                            //echo $id_cont_bun . "<br>";
                        }

                        if($stoc_produs<5)
                        {
                            $sql="UPDATE produse SET STOC='50' WHERE ID_PRODUS='$id_produs'";
                            $res=oci_parse($conn, $sql) or die(oci_error());
                            oci_execute($res);
                            
                            if($res==TRUE)
                            {
                                //echo "Updated successfully" . "<br>";
                            }
                        }
                    }
                    
                }
            }
        }
        
        
        
        
        
        if(isset($_SESSION['cart']))
        {
            unset($_SESSION['cart']);
        }
        
        if(isset($_SESSION['varimg']))
        {
            unset($_SESSION['varimg']);
        }
        
        if(isset($_SESSION['qnt']))
        {
            unset($_SESSION['qnt']);
        }
        
        header("location:".SITEURL.'index.php');
    }
    else
    {
        //redirect page
        header("location:".SITEURL.'contul_meu.php');
    }
?>