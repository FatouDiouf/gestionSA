<?php
    $identif=$_GET['identif'];
    $newligne="";
        $app=fopen('apprenant.txt','r');
              while(!feof($app))
                {
                    $ligne=fgets($app);
                    $col=explode(";",$ligne);
                    
                    if($identif==$col[0])
                    {  
                          

                       if($col[6]=="present\n" || $col[6]=="present")
                        {
                            
                            $col[6]="abandon";
                        }
                        else
                        {
                            $col[6]="present";
                        }
                        $modif=$col[0].";".$col[1].";".$col[2].";".$col[3].";".$col[4].";".$col[5].";".$col[6].";".$col[7].";\n";
                    }
                    else{
                        $modif=$ligne;
                    }
                    
                   $newligne=$newligne.$modif; 
                }
                
                fclose($app);
                $app=fopen('apprenant.txt', 'w+');
                fwrite($app,trim($newligne));
                fclose($app);
                header("location:listerapp.php#identif");
?>