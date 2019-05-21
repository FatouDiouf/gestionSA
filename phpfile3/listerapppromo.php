<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/gesapp.css">
    <title>apprenant d'une promo</title>
</head>
<body>
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
    echo "<table class='table table-bordered table-striped table-condensed'>
            <tr>
                <td>Code</td>
                <td>Nom</td>
                <td>Prenom</td>
                <td>date de naissance</td>
                <td>Telephone</td>
                <td> Mail</td>
                <td>Statut</td>
                <td>Promo</td>
            </tr>";
        $code=$_GET['identif'];
        $app=fopen('apprenant.txt','r');
        while(!feof($app))
        {
            $ligne=fgets($app);
            $col=explode(";",$ligne);
            if($code==$col[7])
            {
                if($col[6]=="present")
                {
                    echo "<tr>  
                            <td>$col[0]</td>
                            <td>$col[1]</td>
                            <td>$col[2]</td>
                            <td>$col[3]</td>
                            <td>$col[4]</td>
                            <td>$col[5]</td>
                            <td>$col[6]</td>
                            <td>$col[7]</td>
                    </tr>";
                }
            }
        }fclose($app);
        echo "</table>";
    ?>
    </div>
</body>
</html>