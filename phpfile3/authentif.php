<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/authentif.css">
    <title>authentification</title>
 
</head>
<body class="contactBody">   
        <div class="wrapper">
        <div class="title">
           
      
        </div>
      

        <form class="form" method="POST">
          <input type="text" class="name entry " placeholder="Votre nom" name="login"/>
          
          <input type="password" class="email entry" placeholder="Votre Code" name="pasword"/>
          
          <button class="submit entry" onclick="thanks()">Connexion</button>
        </form>  
        
        <div class="shadow"></div>
      </div>
      
    <script src="app.js"></script>
    <?php
                        $pwd=@$_POST['pasword'];
                        $users= fopen('user.txt', 'r');
                        while(!feof($users))
                        {
                            $ligne=fgets($users);
                            $col=explode(";",$ligne); 
                            for($i=0; $i<count($col); $i++)
                            {
                                if($pwd==$col[2] && $_POST['login']==$col[1])
                                {
                                    $_SESSION['login']=$col[1];

                                    header ("location:accueil.php");
                                }
                            }
                        }
                        
                        fclose($users);
                  ?>

</body>
</html>