<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/gesapp.css">
    <title>inscription</title>
</head>
<body>

<nav>
	<a href="accueil.php">Accueil</a>
	<a href="inscrireapp.php">Inscription</a>
	<a href="listerapp.php">liste</a>
	<a href="deconnexion.php">Deconnexion</a>
	<div class="animation start-home"></div>
</nav>

<form action="" method="POST">
    <div class="container">
        <h1>Modifier un apprenant</h1>

        <input type="text" placeholder="Entrer votre code" name="code"  class="form-control"> <br>

        <input type="text" placeholder="Entrer votre nom" name="nom"  class="form-control"> <br>

        <input type="text" placeholder="Entrer votre prenom" name="prenom"  class="form-control"> <br>
 
        <input type="date" placeholder="Entrer votre date de naissance" name="naiss"  class="form-control"> <br>

        <input type="number" placeholder="Entrer votre numero de telephone" name="tel"  class="form-control"> <br>
   
        <input type="email" placeholder="Entrer votre mail" name="mail"  class="form-control"> <br>
                       
        <input type="submit" id='submit' value='Modifier' name="modif" class="form-control">
    </div>
</form>


<?php
$identif=$_GET['$identif'];
echo $identif;
        if(isset($_POST['modif']))
        {
            $newligne="";
            $fichier=fopen('apprenant.txt','a+');
              while(!feof($fichier))
                {
                    $ligne=fgets($fichier);
                    $col=explode(";",$ligne);
                    if($_POST['code']==$col[0])
                    {
                        $trouve=true;
                        $col[1]=$_POST['nom'];
                        $col[2]=$_POST['prenom'];
                        $col[3]=$_POST['naiss'];
                        $col[4]=$_POST['tel'];
                        $col[5]=$_POST['mail'];
                        $modif=$col[0].";".$col[1].";".$col[2].";".$col[3].";".$col[4].";".$col[5].";".$col[6].";".$col[7].";".$col[8];
                    }
                    else
                    {
                        $modif=$ligne;
                    }
                   $newligne=$newligne.$modif; 
                }
                fclose($fichier);
                $fichier=fopen('apprenant.txt', 'w+');
                fwrite($fichier,$newligne);
                fclose($fichier);
            }
                $fichier=fopen('apprenant.txt', 'r');
                echo "
                         <table class='table table-bordered table-striped table-condensed'>
                                  <tr>
                                         <td>  Code  </td>  
                                         <td>  Nom  </td> 
                                         <td>   Prenom </td> 
                                         <td>  date de Naissance</td> 
                                         <td>  Telephone</td> 
                                         <td>  Mail</td> 
                                         <td>  Statut</td> 
                                         <td>  Promo</td> 
                                         <td>  Modifier</td> 
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
                                             <td>'.$col[4].'</td> 
                                             <td>'.$col[5].'</td> 
                                             <td>'.$col[6].'</td> 
                                             <td>'.$col[7].'</td> 
                                             <td>'.$col[8].'</td> 
                                        </tr>
                                    ';    
                                  }
                                  fclose($fichier);
                                  echo " </table> ";
       
        
?>

</body>
</html>