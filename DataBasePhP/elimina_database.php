<?php

$tipo_database=$_GET["database"];
$conn = new PDO("mysql:host=localhost;dbname=cinematografia","programma", "12345");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if($tipo_database=="attori"){
    $id_rimuovi=$_POST["id"];
    $sql="DELETE FROM attori WHERE attori.id=". $id_rimuovi. ";";
    $statement= $conn->prepare($sql);
    $statement ->execute(); 
    header("location:database_attori.php");
}
if($tipo_database=="registi"){
    $id_rimuovi=$_POST["id"];
    $sql="DELETE FROM registi WHERE registi.id=". $id_rimuovi. ";";
    $statement= $conn->prepare($sql);
    $statement ->execute(); 
    header("location:database_registi.php");
}
    if($tipo_database=="partecipazioni"){
        $id_rimuovi=$_POST["id_attore"];
        $id_film=$_POST["id_film"];
    $sql="DELETE FROM partecipazioni WHERE partecipazioni.id_attore=".$id_rimuovi." AND partecipazioni.id_film=".$id_film.";";
    $statement= $conn->prepare($sql);
    $statement ->execute(); 
    header("location:partecipazioni.php");
}
if($tipo_database=="film"){
    $id_rimuovi=$_POST["id"];
    $id_recensione=$_POST["id_recensione"];
    $sql="DELETE FROM film WHERE film.id=". $id_rimuovi. ";";
    $statement= $conn->prepare($sql);
    $statement ->execute(); 
    if(isset($id_recensione)){
        $sql="DELETE FROM recensione WHERE recensione.id=". $id_rimuovi. ";";
        $statement= $conn->prepare($sql);
        $statement ->execute(); 
    }
    header("location:database_film.php");
}
if($tipo_database=="recensioni"){
    $id_rimuovi=$_POST["id"];
    $id_film=$_POST["id_film"];
    $sql="DELETE FROM recensione WHERE recensione.id=". $id_rimuovi. ";";
    $statement= $conn->prepare($sql);
    $statement ->execute(); 
    $sql="UPDATE film SET film.id_recensione=NULL WHERE film.id= " . $id_film. ";";
    $statement= $conn->prepare($sql);
    $statement ->execute(); 
    header("location:database_attori.php");
}
?>