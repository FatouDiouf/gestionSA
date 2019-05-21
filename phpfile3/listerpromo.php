<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/gesapp.css">
    <title>Lister promo</title>
</head>
<body>
<h1>Gestion des promos</h1>

<nav>
	<a href="accueil.php">Accueil</a>
	<a href="promo.php">ajout promo</a>
	<a href="listerpromo.php">lister </a>
	<a href="deconnexion.php">Deconnexion</a>
	<div class="animation start-home"></div>
</nav>
<br> <br>
    <div class="container">

    <?php
     
                echo "
                         <table class='table table-bordered table-striped table-condensed'>
                                  <tr>
                                         <th>  Code  </th>  
                                         <th>  Nom  </th> 
                                         <th>  moi </th> 
                                         <th>  annee</th>  
                                         <th>  nomdre apprenant</th>
                                         <th>  Modifier</th> 
                                         <th>  lister</th> 

                                  </tr>
                     ";  
                                  $fichier=fopen('promo.txt','r');
                                 while(!feof($fichier))
                                  {
                                    $ligne=fgets($fichier);
                                    $cole=explode(";",$ligne);
                                    echo "<tr>";

                                    for($i=0;$i<count($cole)-1;$i++)
                                    {
                                       echo '<td>'.$cole[$i].'</td>';
                                    }
                                    $cpt=0;
                                   $app=fopen('apprenant.txt','r');
                                    while(!feof($app))
                                    {
                                       $lign=fgets($app);
                                        $col=explode(";",$lign);
                                        if($col[7]==$cole[0] || $col[7]==$cole[0]."\n")
                                        {
                                            $cpt=$cpt+1;
                                        }
                                    }fclose($app);
                                   
                                   echo ' <td>'.$cpt.'</td>';
                                   echo  '<td><a id="'.$cole[0].'" href="modifierpromo.php?identif='.$cole[0].'&nom='.$col[1].'"><button class="btn-button form-control">Modifier</button></a></td>';
                                   echo  '<td><a id="'.$cole[0].'" href="listerapppromo.php?identif='.$cole[0].'"><button class="btn-button form-control">lister</button></a></td>';
                                          
                                  echo ' </tr> ';     
                                  }
                                  fclose($fichier);
                                  echo " </table> ";
       
        
?>
    </div>
</body>
</html>