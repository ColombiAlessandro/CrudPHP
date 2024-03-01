<?php
    session_start();
    $tipo_database=$_GET["database"];
    $servername="localhost";
        $username= "programma";
        $password= "12345";
        $conn = new PDO("mysql:host=$servername;dbname=cinematografia", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($tipo_database== "attori"){
        $id_attore=$_POST["id_attore"];
        $nome=$_POST["nome_attore"];
        $cognome=$_POST["cognome_attore"];
        $data_di_nascita=$_POST["data_nascita"];
        $data_di_morte=$_POST["data_morte"];
        $sql="UPDATE attori SET nome = :nome, cognome =:cognome, data_di_nascita =:data_di_nascita, data_di_morte = :data_di_morte WHERE attori.id = :id;";
        $statement= $conn->prepare($sql);
        $statement->bindparam(":id",$id);
        $statement->bindparam(":nome",$nome);
        $statement->bindparam(":cognome",$cognome);
        $statement->bindparam(":data_di_nascita",$data_di_nascita);
        $statement->bindparam(":data_di_morte",$data_di_morte);
        $statement ->execute(); 
        header("location:database_attori.php");
    }
    if($tipo_database== "registi"){
        $id=$_SESSION["id_regista"];
        $nome=$_POST["nome_regista"];
        $cognome=$_POST["cognome_regista"];
        $data_di_nascita=$_POST["data_nascita"];
        $data_di_morte=$_POST["data_morte"];
        $sql="UPDATE registi SET nome = :nome, cognome =:cognome, data_di_nascita =:data_di_nascita, data_di_morte = :data_di_morte WHERE registi.id = :id;";
        $statement= $conn->prepare($sql);
        $statement->bindparam(":id",$id);
        $statement->bindparam(":nome",$nome);
        $statement->bindparam(":cognome",$cognome);
        $statement->bindparam(":data_di_nascita",$data_di_nascita);
        $statement->bindparam(":data_di_morte",$data_di_morte);
        $statement ->execute(); 
        header("location:database_registi.php");
    }
    if($tipo_database== "film"){
        $id=$_SESSION["id_film"];
        $nome=$_POST["nome_film"];
        $durata=$_POST["durata"];
        $genere=$_POST["genere"];
        $id_regista=$_POST["id_regista"];
        $data_uscita=$_POST["data_uscita"];
        $sql="UPDATE film SET nome=:nome,durata=:durata,genere=:genere,data_uscita=:data_uscita,id_regista=:id_regista WHERE film.id=:id";
        $statement= $conn->prepare($sql);
        $statement->bindparam(":id",$id);
        $statement->bindparam(":nome",$nome);
        $statement->bindparam(":durata",$durata);
        $statement->bindparam(":genere",$genere);
        $statement->bindparam(":data_uscita",$data_uscita);
        $statement->bindparam(":id_regista",$id_regista);
        $statement ->execute();
        header("location:database_film.php");
    }
    if($tipo_database== "partecipazioni"){
        $id_attore=$_POST["id_attore"];
        $id_film=$_POST["id_film"];
        $id_att1=$_SESSION["id_attoreP"];
        $id_film1=$_SESSION["id_filmP"];
        $sql="UPDATE partecipazioni SET id_attore=:id_attore,id_film=:id_film WHERE id_attore=:id1 AND id_film=:id2";
        $statement= $conn->prepare($sql);
        $statement->bindparam(":id_attore",$id_attore);
        $statement->bindparam(":id_film",$id_film);
        $statement->bindparam(":id1",$id_att1);
        $statement->bindparam(":id2",$id_film1);
        $statement ->execute(); 
        header("location:partecipazioni.php");
    }
?>