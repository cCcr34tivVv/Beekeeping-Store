<?php   
    include ('partials/header.php');
?>

<?php   
     include ('partials/menu.php');
?>

<div class="title-page">
    <h1>Cosul meu</h1>
</div> 
        
<div class="content">
    <?php
    
    if(isset($_SESSION['already_added']))
    {
        //display session message
        echo $_SESSION['already_added'];
        //remove session message
        unset($_SESSION['already_added']);
    }
    
    $variabila=-1;
    
    //in acest vector am tinut minte pozele pt fiecare produs
    $varimg=array();
    
    if(isset($_SESSION['varimg'])){
        foreach($_SESSION['varimg'] as $key => $value)
        {
            foreach($value as $key1 => $value1)
            {
                array_push($varimg, $value1);
            }
        }
    }
    
    /*
    foreach($varimg as $key)
    {
        echo $key . " ";
    }
    */
    
    //echo "<br>";
    
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
    
        if(isset($_SESSION['cart'])){
        $count= count($_SESSION['cart']);
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

            //luam id ul tipului de produs
            $sql="SELECT TIPURI_PRODUSE_ID_TIP FROM produse WHERE ID_PRODUS='$id_produs'";
            $res=oci_parse($conn, $sql) or die(oci_error());
            oci_execute($res);
            //echo $res;


            if($res==TRUE)
                    {
                        //numar randurile sa vad daca am date sau nu in baza de date
                        // Necessary because oci_num_rows() only gathers rows returned to the buffer via oci_fetch*() functions when using SELECT statements.
                        oci_fetch_all($res,$array);
                        // Won't actually be needing the data, so we can unset that.
                        unset($array);
                        $count = oci_num_rows ($res);


                        //avem nev pt oci fetch assoc
                        $res=oci_parse($conn, $sql) ;
                        oci_execute($res);

                        if($count>0)
                        {

                            //avem date in baza de date
                            while($rows=oci_fetch_assoc($res))
                            {
                                //folosim while pt a lua toate datele din baza de date
                                //while ul va rula cat timp avem date in baza de date

                                //luam datele 
                                $id_tip=$rows['TIPURI_PRODUSE_ID_TIP'];
                                //afisare date
                                //echo $id . " " . $name . "<br>";
                                //echo $id_tip;
                            }
                        }
                }

            $sql="SELECT * FROM produse WHERE ID_PRODUS='$id_produs'";
            $res=oci_parse($conn, $sql) or die(oci_error());
            oci_execute($res);
                
            /*    
            $var=$_SESSION['varimg'];
            //echo $var;
            $qnt=$_SESSION['qnt'];
            */
                
            $var=$varimg[$variabila];
            $qnt=$cantitate[$variabila];
            
            if($res==TRUE)
                    {
                        //numar randurile sa vad daca am date sau nu in baza de date
                        // Necessary because oci_num_rows() only gathers rows returned to the buffer via oci_fetch*() functions when using SELECT statements.
                        oci_fetch_all($res,$array);
                        // Won't actually be needing the data, so we can unset that.
                        unset($array);
                        $count = oci_num_rows ($res);


                        //avem nev pt oci fetch assoc
                        $res=oci_parse($conn, $sql) ;
                        oci_execute($res);

                        if($count>0)
                        {

                            //avem date in baza de date
                            while($rows=oci_fetch_assoc($res))
                            {
                                //folosim while pt a lua toate datele din baza de date
                                //while ul va rula cat timp avem date in baza de date

                                //luam datele 
                                $name=$rows['DENUMIRE_PRODUS'];
                                $stock=$rows['STOC'];
                                $price=$rows['PRET'];
                                $measure_unit=$rows['UNITATE_MASURA'];
                                //afisare date
                                //echo $id . " " . $name . "<br>";

                                $name=ucfirst($name);

                                ?>

                                    <div class="col-4 text-center">

                                       <img src="<?php echo "images/category$id_tip/$var.jpg"; ?>" class="img-responsive round">
                                        <h2><?php echo $name; ?></h2>
                                        <br>
                                        <h3>Stoc : <?php echo $stock; ?></h3>
                                        <h3>Pret : <?php echo $price; ?></h3>
                                        <h3>Unitate : <?php echo $measure_unit; ?></h3>

                                        <form class="input-form" action="add_product.php?id_produs=<?=$id?>" method="post" 
                                           onkeydown="return event.key != 'Enter';">
                                            <input class="input-box" type="number" name="qnt" placeholder="Cantitate" 
                                            max="<?php echo $stock; ?>" min="1" value="<?php echo $qnt; ?>" readonly> 
                                        </form>
                                    </div>

                                <?php
                            }
                        }
                }
             }
           }
        }
    else
    {
        ?>
            <h3> Nu sunt produse in cos. </h3>
        <?php
        
    }
    ?>
    
    <form class="input-form" action="order_products.php" method="post" onkeydown="return event.key != 'Enter';">
        <button class="input-button" type="submit" name="order">Cumpara produsele</button>
    </form>
    
</div>
    
<?php   
     include ('partials/footer.php');
?> 