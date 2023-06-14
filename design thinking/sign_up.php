

<?php
    $p=$_POST["pnom"];
    $n=$_POST["nom"];
    $g=$_POST["gmail"];
    $s=$_POST["stat"];
    $pa=$_POST["pass"];
    $cpa=$_POST["cpass"];

    if($cpa!=$pa){
        header("location:sign.html");
    }

    
    $log="root";
    $pass="";
    



    try{
        $conn=new PDO("mysql:host=localhost;dbname=database",$log,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        
    }catch(PDOException $e){
        echo "echec:" . $e->getMessage();
        die();
    }
    
    $req=$conn->prepare("insert into connexion(p,n,g,s,pass) values(:p,:n,:g,:s,:pa)");
    $req->bindParam(':p',$p);
    $req->bindParam(':n',$n);
    $req->bindParam(':g',$g);
    $req->bindParam(':s',$s);
    $req->bindParam(':pa',$pa);
    $req->execute();
    



    
?>