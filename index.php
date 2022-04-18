<?php   
    include ('partials/header.php');
?>

<?php   
     include ('partials/menu.php');
?>
    
<div class="title-page">
    <h1>Categorii produse</h1>

</div>    
    
<div class="content">
      
    <?php
        
    
        //var pt poza (deocamdata)
        $var=1;    
    
        $sql="SELECT * FROM tipuri_produse";
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
                        $id=$rows['ID_TIP'];
                        $name=$rows['DENUMIRE_TIP'];
                        
                        //afisare date
                        //echo $id . " " . $name . "<br>";
                        
                        $name=ucfirst($name);
                        
                        ?>
                        
                            <div class="col-4 text-center">
                              <a href="produse.php?data=<?=$id?>" >
                               <img src="<?php echo "images/categories/$var.jpg"; ?>" class="img-responsive round">
                                <h2><?php echo $name; ?></h2>
                                </a>
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