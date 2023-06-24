

<?php

if(isset($_POST["submit"])){
    $p=$_POST["pnom"];
    $n=$_POST["nom"];
    $g=$_POST["gmail"];
    $s=$_POST["stat"];
    $pa=$_POST["pass"];
    $cpa=$_POST["cpass"];

    if($cpa!=$pa){
        header("location:sign_up.php?error=pass");
    }

    
    $log="root";
    $pass="";
    



    include "conn.php";
    
    $req=$conn->prepare("insert into connexion(p,n,g,s,pass) values(:p,:n,:g,:s,:pa)");
    $req->bindParam(':p',$p);
    $req->bindParam(':n',$n);
    $req->bindParam(':g',$g);
    $req->bindParam(':s',$s);
    $req->bindParam(':pa',$pa);
    $req->execute();
}  


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formation.css"/>
    <link rel="stylesheet" href="signup.css"/>
    <title>Document</title>
</head>
<body>
    <div class="head">
        <div class="logo">
            <img src="images/logo.png" alt="">
            <h2 >INEGUIDE</h2>
        </div>
        <div class="crumbs">        
            <a>Quiz</a>
            <a>Forum</a>
            <a>Sign in</a>
        </div>
    </div>
    <div class="all">
        <form class="form" action="sign_up.php" method="post">

            <?php 
            if(isset($_GET["error"]) && $_GET["error"]=="pass"){
                ?>
                <div class="error">
                    <p>Veuillez confirmer votre mot de passe</p>
                </div>
                <?php
            }
            ?>
            <input type="text" name="pnom" id="p" placeholder=" Prenom" required>
            <input type="text" name="nom" id="n" placeholder=" Nom" required>
            <input type="text" name="gmail" id="g" placeholder=" xxxx@xxxx" required>
            <label class="stat">Statut:</label>
            <input type="radio" name="stat" value="ec" checked>
            <label for="e class">éleve CPGE</label>
            <input type="radio" name="stat" value="ei">
            <label for="e ing">éleve ingenieur</label>
            <input type="radio" name="stat" value="i">
            <label for="ing">Ingénieur</label>
            <input type="text" name="pass" id="pa" placeholder="Mot de passe" required>
            <input type="text" name="cpass" id="cpa" placeholder="Confirmer">
            <p></p>
            <input type="submit" value="Sign up" name="submit">
        </form>
        <div class="end"></div>
        <img src="images/inscript.png">
        
    </div>
</body>
</html>