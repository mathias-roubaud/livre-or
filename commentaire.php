<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/commentaire.css" rel="stylesheet" type="text/css" >
    <title>Commentaire</title>
</head>
<body>

    <header>
            <div class="bouton">
                <div id="boutona"> <a href ="http://localhost/livre-or/index.php/"> Accueil </a> </div>
                <div id="boutonb"> <a href ="https://support.rockstargames.com/fr/"> Contact </a> </div>
                <div id="boutonc"> <a href ="https://localhost/livre-or/connexion.php"> Déjà inscrit ? </a> </div>
            </div>
            <div class ="topleft">
                <a href="https://socialclub.rockstargames.com/"> 
                <img src="https://static.wixstatic.com/media/e240ad_232f5286c5fd4835b0eab59a04d1a368~mv2.png/v1/fill/w_786,h_264,al_c/e240ad_232f5286c5fd4835b0eab59a04d1a368~mv2.png" height="100%"></a>
                </div>
    </header>

    <div class="middle">
            <img src="https://static.wixstatic.com/media/e240ad_232f5286c5fd4835b0eab59a04d1a368~mv2.png/v1/fill/w_786,h_264,al_c/e240ad_232f5286c5fd4835b0eab59a04d1a368~mv2.png" height="100%" width="100%">
            <h2> Laissez nous un commentaire ! </h2>
                    <form method="POST" action="">
                    <hr>
                    <strong><p>Votre nom :</p></strong>

                    <input type="text" name="nom">
                    <strong><p>Votre commentaire :</p></strong>
      
                    <textarea name="commentaire" rows="6" cols="35"></textarea><br/><br/>
                    <input type="submit" name="submit" value="Poster">

                    </form>
    </div>

    <?php
        if(isset($_POST['submit']))
        {
            if(!empty($_POST['commentaire'])&&!empty($_POST['nom']))
            {
                $nom=$_POST['nom'];
                $commentaire=$_POST['commentaire'];
                if(strlen($nom)>25){
                    echo"Votre nom ne doit pas dépasser les 25 caractères";
                }
                else if(strlen($commentaire)>100){
                    echo"Votre commentaire ne doit pas dépasser les 100 caractères";
                }
            }
            elseif(isset($nom) and isset($commentaire)) {echo"Vous devez saisir tous les champs pour pouvoir laisser un commentaire";}
        
            date_default_timezone_set("Europe/Paris");
            $date = date("Y-m-d H:i:s");

            $connect = mysqli_connect('localhost','root','','livreor');
            echo $nom,$commentaire, $date;
            $query = mysqli_query("INSERT INTO `commentaires`(`commentaire`, `id_utilisateur`, `date`) VALUES ('$commentaire','$nom','$date')");
            if($query)
            {
                echo"Tout est ok";
            }



        }


    ?>


        <br><br><br><br><br><br><br>

        <footer>
        <a href="https://www.instagram.com/rockstargames/">
        <img src="https://cdn-icons-png.flaticon.com/512/174/174855.png" height="60px" width="60px"></a>
        <a href="https://twitter.com/RockstarGames">
        <img src="https://assets.stickpng.com/thumbs/580b57fcd9996e24bc43c53e.png" height="60px" width="60px"></a>
        <a href="https://www.facebook.com/groups/1391002414314906/?mibextid=HsNCOg">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Facebook_f_logo_%282019%29.svg/2048px-Facebook_f_logo_%282019%29.svg.png" height="60px" width="60px"></a>
        </footer>

</body>
</html>