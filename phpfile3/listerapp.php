<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/gesapp.css">
    <title>lister apprenants</title>
</head>
<body>
<h1>Gestion des apprenants</h1>
<nav>
	<a href="accueil.php">Accueil</a>
	<a href="inscrireapp.php">Inscription</a>
	<a href="listerapp.php">liste</a>
	<a href="deconnexion.php">Deconnexion</a>
	<div class="animation start-home"></div>
</nav>

<h1>liste des apprenants</h1>

<div class="container">
<table class="table table-bordered table-striped table-condensed">
                
                <thead>
                    <tr>
                        <th> Code </th>
                        <th>  Nom </th>
                        <th> Prenom </th>
                        <th> Date de naissance </th>
                        <th> Numéro de telephone </th>
                        <th> Adresse Mail</th>
                        <th>Statut</th>
                        <th>Promo</th>
                        <th>Modifier</th>
                    </tr>
                </thead>
            <tbody>
                <?php
                     $app= fopen('apprenant.txt', 'r');
                     $promo="";
                     while(!feof($app))
                     {
                          $ligne=fgets($app);
                         $col=explode(";",$ligne); 
                        
                            echo '
                            <tr>
                               <td>'.$col[0].'</td>
                               <td>'.$col[1].'</td>
                               <td>'.$col[2].'</td>
                               <td>'.$col[3].'</td>
                               <td>'.$col[4].'</td>
                               <td>'.$col[5].'</td>
                               <td><a id="'.$col[0].'" href="exclure.php?identif='.$col[0].'"> <button class="btn-button form-control">'.$col[6].'</button></a></td>
                               <td>'.$col[7].'</td>
                               <td><a id="'.$col[0].'" href="modifierapp.php?identif='.$col[0].'"><button class="btn-button form-control">'.$col[8].'</button></a></td>
                            <tr/>';
                            
                        }fclose($app);
                ?>
            </tbody>
            </table>  
</div>
</body>
</html>