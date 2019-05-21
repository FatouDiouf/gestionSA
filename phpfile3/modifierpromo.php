<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/gesapp.css">
    <title>modifier promo</title>
</head>
<body>
    <div class="container">
    <h1>Gestion des promos</h1>

<nav>
	<a href="accueil.php">Accueil</a>
	<a href="promo.php">ajout promo</a>
	<a href="listerpromo.php">lister </a>
	<a href="deconnexion.php">Deconnexion</a>
	<div class="animation start-home"></div>
</nav>

    <form action="" method="POST">
    <div class="container">
        <h1>Modifier une promotion</h1>
        <input type="text" placeholder="Entrer le nom du code de la promo" name="code" required class="form-control"> <br>
        <input type="text" placeholder="Entrer le nom de la promo" name="nom" required class="form-control"> <br>
     
        <label><b>Mois</b></label>  
        <select name="mois">
            <option >Janvier</option>
            <option >Février</option>
            <option >Mars</option>
            <option >Avril</option>
            <option >Mai</option>
            <option >Juin</option>
            <option >Juillet</option>
            <option >Août</option>
            <option >Septembre</option>
            <option >Octobre</option>
            <option >Novembre</option>
            <option >Decembre</option>
        </select>
        
        <label><b>Année</b></label>
        <select name="anne">
            <option >2016</option>
            <option >2017</option>
            <option >2018</option>
            <option >2019</option>
            <option >2020</option>
            <option >2021</option>
            <option >2022</option>
            <option >2023</option>
            <option >2024</option>
            <option >2025</option>
            <option >2026</option>
            <option >2027</option>
            <option >2028</option>
            <option >2029</option>
            <option >2030</option>
        </select>
        <input type="submit" id='submit' value='Modifier' name="modif" class="form-control">
        </form>
    <br>

        <?php
        if(isset($_POST['modif']))
        {
            $newligne="";
            $fichier=fopen('promo.txt','a+');
              while(!feof($fichier))
                {
                    $ligne=fgets($fichier);
                    $col=explode(";",$ligne);
                    if($_POST['code']==$col[0])
                    {
                        $trouve=true;
                        $col[1]=$_POST['nom'];
                        $col[2]=$_POST['mois'];
                        $col[3]=$_POST['anne'];
                        $modif=$col[0].";".$col[1].";".$col[2].";".$col[3].";".$col[4];
                    }
                    else
                    {
                        $modif=$ligne;
                    }
                   $newligne=$newligne.$modif; 
                }
                fclose($fichier);
                $fichier=fopen('promo.txt', 'w+');
                fwrite($fichier,$newligne);
                fclose($fichier);
            }
                $fichier=fopen('promo.txt', 'r');
                echo "
                         <table class='table table-bordered table-striped table-condensed'>
                                  <tr>
                                         <td>  Code  </td>  
                                         <td>  Nom  </td> 
                                         <td>   mois </td> 
                                         <td>  année</td>  
                                  </tr>
                     ";  
                                  
                                  while(!feof($fichier))
                                  {
                                    $ligne=fgets($fichier);
                                    $col=explode(";",$ligne);
                                        echo '
                                        <tr>
                                             <td>'.$col[0].'</td>
                                             <td>'.$col[1].'</td>
                                             <td>'.$col[2].'</td> 
                                             <td>'.$col[3].'</td>  
                                        </tr>
                                    ';    
                                  }
                                  fclose($fichier);
                                  echo " </table> ";
       
        
?>

    </div>
</body>
</html>