<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/inscription.css" rel="stylesheet" type="text/css" >
    <title>Inscription</title>
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
                <h2>Inscrivez-vous au social club de Rockstar Games ! <br><br></h2>
                <form method="post">
                    <input type="text" name="pseudo" id="pseudo" placeholder="Identifiant" required><br>
                    <input type="text" name="prenom" id="prenom" placeholder="Prénom" required><br>
                    <input type="text" name="nom" id="nom" placeholder="Nom" required><br>
                    <input type="text" name="pswrd1" id="pswrd" placeholder="Mot de passe" required><br>
                    <input type="text" name="pswrd2" id="pswrd" placeholder="Confirmez le Mot de passe" required><br>
                    <input type="submit" name="formsend" value="submit" id="formsend">
                    <br>
                </form>

        <?php

            if(isset($_POST['formsend'])){

                $pseudo = $_POST['pseudo'];
                $prenom = $_POST['prenom'];
                $nom = $_POST['nom'];
                $pswrd1 = $_POST['pswrd1'];
                $pswrd2 = $_POST['pswrd2'];

                if ($pswrd1 === $pswrd2){
                    if(!empty($pseudo) && !empty($prenom) && !empty($nom) && !empty($pswrd1)){
                        echo '<a href=https://localhost/livre-or/connexion2.php> Cliquez ici pour vous connecter !</a>';
    
    
                        $mysqli = new mysqli('localhost', 'root', '', 'livreor');
                        //la requete sql
                        $sql = "INSERT INTO `Utilisateurs`(`login`, `prénom`, `nom`, `password`) VALUES ('$pseudo','$prenom','$nom','$pswrd1')";
                        //si requete réussit
                        if ($mysqli->query($sql) === TRUE) {
                        echo "";
                        }
                    }
                }
                else{
                    echo "Mot de passe non identiques";
                }
            }

        ?>

                </div>
        </div>
    
    <?php
        if(isset($_POST['formsend'])){

            $pseudo = $_POST['pseudo'];
            $pswrd1 = $_POST['pswrd1'];

            $mysqli = new mysqli('localhost', 'root', '', 'livreor');
            //la requete sql

            $sql = "SELECT count(*) FROM `Utilisateurs` WHERE `password` = '$pswrd1' and `login` = '$pseudo'";
            $exec = mysqli_query($mysqli,$sql);
            $reponse = mysqli_fetch_array($exec);
            $count=$reponse['count(*)'];
            if ($count!=0) {
            echo "";
        
        }

        }

    ?>


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