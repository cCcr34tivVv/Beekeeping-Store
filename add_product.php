<?php include('config/constants.php') ?> 

<?php
    ///////////////////
    //adaugare produs//
    ///////////////////
    if(isset($_POST['add_product']))
    {
        //echo "buton apasat!";
        
        //id_produs
        $id_produs=$_GET['id_produs'];
        //echo $id_produs;
        
        $var=$_GET['varimg'];
        //echo $var;
        
        $qnt=$_POST['quantity'];
        //echo $qnt;
        
        if(isset($_SESSION['cart']))
        {
            $item_array_id=array_column($_SESSION['cart'],"id_produs");
            //print_r($item_array_id);
            
            if(in_array($id_produs, $item_array_id))
            {
                $_SESSION['already_added']="Produsul se afla deja in cos";
            }
            else
            {
                $count= count($_SESSION['cart']);
                $item_array=array(
                'id_produs' => $id_produs
                );
                
                $_SESSION['cart'][$count]=$item_array;
                //print_r($_SESSION['cart']);
            }
        }
        else
        {
            $item_array=array(
                'id_produs' => $id_produs
            );
            $_SESSION['cart'][0]=$item_array;
            //print_r($_SESSION['cart']);
                    
        }
        
        if(isset($_SESSION['varimg']))
        {
            $item_array_id1=array_column($_SESSION['varimg'],"varimg");
            //print_r($item_array_id);
            
            //if(in_array($var, $item_array_id1))
            //{
                //echo "produsul se afla in cos";
            //}
            //else
           // {
                $count= count($_SESSION['varimg']);
                $item_array1=array(
                'varimg' => $var
                );
                
                $_SESSION['varimg'][$count]=$item_array1;
                //print_r($_SESSION['cart']);
            //}
        }
        else
        {
            $item_array1=array(
                'varimg' => $var
            );
            $_SESSION['varimg'][0]=$item_array1;
            //print_r($_SESSION['cart']);
                    
        }
        
        if(isset($_SESSION['qnt']))
        {
            $item_array_id2=array_column($_SESSION['qnt'],"qnt");
            //print_r($item_array_id);
            
            //if(in_array($qnt, $item_array_id2))
            //{
                //echo "produsul se afla in cos";
            //}
            //else
            //{
                $count= count($_SESSION['qnt']);
                $item_array2=array(
                'qnt' => $qnt
                );
                
                $_SESSION['qnt'][$count]=$item_array2;
                //print_r($_SESSION['cart']);
           // }
        }
        else
        {
            $item_array2=array(
                'qnt' => $qnt
            );
            $_SESSION['qnt'][0]=$item_array2;
            //print_r($_SESSION['cart']);
                    
        }
        
        
        if(isset($_SESSION['id_cont']))
        {
            //$_SESSION['varimg']=$var;
            //echo $_SESSION['varimg'];
            //$_SESSION['qnt']=$qnt;
            
            //avem un utilizator inregistrat deci se poate face comanda
            header("location:".SITEURL.'cos.php');
        }
        else
        {
            //nu avem nici un utilizator inregistrat
            $_SESSION['customer']="Trebuie sa te autentifici sau sa iti creezi un cont";
            //redirect page
            header("location:".SITEURL.'contul_meu.php');
        }
        
    }
?>