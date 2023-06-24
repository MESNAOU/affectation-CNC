<?php
try{
    $conn=new PDO("mysql:host=localhost;dbname=database1",$log,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        
}catch(PDOException $e){
    echo "echec:" . $e->getMessage();
    die();
}

?>