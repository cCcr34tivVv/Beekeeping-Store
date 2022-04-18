<?php   
    include ('partials/header.php');
?>

<?php   
     include ('partials/menu.php');
?>

<div class="title-page">
    <h1>
    <?php
        $id_tip=$_GET['data'];
        //echo $id_tip;
        
        $sql="SELECT * FROM tipuri_produse WHERE ID_TIP='$id_tip'";   
        $res=oci_parse($conn, $sql) or die(oci_error());
        oci_execute($res);
        
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
                        $name=$rows['DENUMIRE_TIP'];
                        
                        //afisare date
                        //echo $id . " " . $name . "<br>";
                        $name=ucfirst($name);
                        echo $name;
                    }
                }
        }

    ?>
    </h1>
</div> 
        
<div class="content">
    <?php
        //var pt poza (deocamdata)
        $var=1;    
        $id_tip=$_GET['data'];
        $_SESSION['id_tip']=$id_tip;
    
        $sql="SELECT * FROM produse WHERE TIPURI_PRODUSE_ID_TIP='$id_tip'";
        $res=oci_parse($conn, $sql) or die(oci_error());
        oci_execute($res);
        
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
                        $id=$rows['ID_PRODUS'];
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
                                
                                <form class="input-form" action="add_product.php?id_produs=<?=$id?>&varimg=<?=$var?>" method="post" onkeydown="return event.key != 'Enter';">
                                    <input class="input-box" type="number" name="quantity" placeholder="Cantitate" 
                                    max="<?php echo $stock; ?>" min="1">
                                    <button class="input-button" type="submit" name="add_product">Adauga in cos</button>   
                                </form>
                            </div>
                        
                        <?php
                        $var++;
                    }
                }
        }

    ?>
    
    <div class="clearfix"></div>
            
</div>
    
<?php   
     include ('partials/footer.php');
?> 