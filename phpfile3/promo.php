<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/gesapp.css">
    <title>ajouter promo</title>
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


    <div class="container">
    <form action="" method="POST">
    <div class="container">
        <h1>Ajouter une promotion</h1>
        
        <input type="text" placeholder="Entrer le nom de la promo" name="nompro" required class="form-control"> <br>
     
        <div class="row">
           <div class="col-lg-2"></div>
           <div class="col-lg-3">
            <select name="mois" class="form-control">
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
           </div>
           
           <div class="col-lg-2"></div>
           <div class="col-lg-3 ">
           <select name="anne" class="form-control">
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
           
           
           </div>
           <div class="col-lg-2"></div>
        </div>
        <br>
        <input type="submit" id='submit' value='Ajouter' name="ajout" class="form-control">
    </div>
</form>

<?php
    if(isset($_POST['ajout']))
    {
        $app= fopen('promo.txt', 'a+'); 
        $code=rand(1,500);       
            while(!feof($app))
            {  
                $ligne=trim(fgets($app));
                $col=explode(";",$ligne); 
                if($col[0]==$code)
                {
                    echo "<font color='red'><h3>Cet identifiant exixte déja!!!!!!!</h3></font><br>";   
                }else
                {
                    fwrite($app,"\n".$code.";".$_POST['nompro'].";".$_POST['mois'].";".$_POST['anne'].";") ;
                }             
            }          
        fclose($app); 
    }                 
?> 
    </div>
    <p>
  By <span>Sonatel Academy</span>
</p>
</body>
</html>