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
        <h1>Ajouter un apprenant</h1>

        <input type="text" placeholder="Entrer votre nom" name="nom" required class="form-control"> <br>

        <input type="text" placeholder="Entrer votre prenom" name="prenom" required class="form-control"> <br>
 
        <input type="date" placeholder="Entrer votre date de naissance" name="naiss" required class="form-control"> <br>

        <input type="number" placeholder="Entrer votre numero de telephone" name="tel" required class="form-control"> <br>
   
        <input type="email" placeholder="Entrer votre mail" name="mail" required class="form-control"> <br>
        <div class="row">
        <div class="col-lg-6">
        <label><b>Statut</b></label>  
        <select name="statut" class="form-control">
            <option >present</option>
            <option >exclu</option>
        </select>  
        </div>

        <div class="col-lg-6">
        <label><b>promo</b>       </label> 
        <?php
          echo  "
          <select name='promo' class='form-control'>";
              $fichier=fopen('promo.txt','r');
              while( $ligne=fgets($fichier))
              {
                  $col=explode(";",$ligne);
                 echo "
                  <option value='".$col[0]."' >".$col[1]."</option>"; }
           echo "</select> ";
           fclose($fichier);
             
        ?>
  
        </div>
        </div>
        <br>

        <input type="submit" id='submit' value='Ajouter' name="ajout" class="form-control">
    </div>
</form>

<?php
    if(isset($_POST['ajout']))
    {
        $trouve=false;
        $app= fopen('apprenant.txt', 'a+'); 
        $code="SA".rand(1,1000);
                        
            while(!feof($app))
            { 
                $ligne=trim(fgets($app));
                $col=explode(";",$ligne); 
                if($col[0]==$code)
                {
                    $trouve=true;
                  echo "<font color='red'><h3>Cet identifiant exixte déja!!!!!!!</h3></font><br>";  
               }          
            }
            if($trouve==false)
               {  
                    fwrite($app,"\n".$code.";".$_POST['nom'].";".$_POST['prenom'].";".$_POST['naiss'].";".$_POST['tel'].";".$_POST['mail'].";".$_POST['statut'].";".$_POST['promo'].";") ;
                }      
        fclose($app);
    }                 
?> 


</body>
</html>