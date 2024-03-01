<?php
$tipo_database=$_GET["database"];
$conn = new PDO("mysql:host=localhost;dbname=cinematografia","programma", "12345");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($tipo_database)){
    if($tipo_database=="attori")
    {
        $nome=$_POST["nome_attore"];
        $cognome=$_POST["cognome_attore"];
        $data_di_nascita=$_POST["data_nascita"];
        $data_di_morte=$_POST["data_morte"];
        $sql="INSERT INTO attori (nome,cognome,data_di_nascita,data_di_morte) VALUES(:nome,:cognome,:data_di_nascita,:data_di_morte);";
        $statement= $conn->prepare($sql);
        $statement->bindparam(":nome",$nome);
        $statement->bindparam(":cognome",$cognome);
        $statement->bindparam(":data_di_nascita",$data_di_nascita);
        $statement->bindparam(":data_di_morte",$data_di_morte);
        $statement ->execute(); 
        header("location:database_attori.php");
    }
    if($tipo_database=="registi"){
        $nome=$_POST["nome_regista"];
        $cognome=$_POST["cognome_regista"];
        $data_di_nascita=$_POST["data_nascita"];
        $data_di_morte=$_POST["data_morte"];
        $sql="INSERT INTO registi (nome,cognome,data_di_nascita,data_di_morte) VALUES(:nome,:cognome,:data_di_nascita,:data_di_morte);";
        $statement= $conn->prepare($sql);
        $statement->bindparam(":nome",$nome);
        $statement->bindparam(":cognome",$cognome);
        $statement->bindparam(":data_di_nascita",$data_di_nascita);
        $statement->bindparam(":data_di_morte",$data_di_morte);
        $statement ->execute(); 
        header("location:database_registi.php");
    }
    if($tipo_database== "partecipazioni"){
        $id_attore=$_POST["id_attore"];
        $id_film=$_POST["id_film"];
        $sql="INSERT INTO partecipazioni (id_attore,id_film) VALUES(:id_attore,:id_film);";
        $statement= $conn->prepare($sql);
        $statement->bindparam(":id_attore",$id_attore);
        $statement->bindparam(":id_film",$id_film);
        $statement ->execute(); 
        header("location:partecipazioni.php");
    }
    if($tipo_database=="film_recensioni"){
        $nome=$_POST["nome_film"];
        $durata=$_POST["durata"];
        $genere=$_POST["genere"];
        $id_regista=$_POST["id_regista"];
        $data_uscita=$_POST["data_uscita"];
        $valutazione=$_POST["valutazione"];
        $descrizione=$_POST["descrizione"];
        $sql="INSERT INTO film (nome,durata,genere,data_uscita,id_regista) VALUES(:nome,:durata,:genere,:data_uscita,:id_regista);";
        $statement= $conn->prepare($sql);
        $statement->bindparam(":nome",$nome);
        $statement->bindparam(":durata",$durata);
        $statement->bindparam(":genere",$genere);
        $statement->bindparam(":data_uscita",$data_uscita);
        $statement->bindparam(":id_regista",$id_regista);
        $statement ->execute();
        $id_film;
       $sql="SELECT film.id FROM film;";
       $statement= $conn->prepare($sql);
       $statement ->execute();
       $result = $statement->fetchAll();
       foreach($result as $row){
        $id_film=$row["id"];
       } 
       $sql="INSERT INTO recensione (valutazione,descrizione,id_film) VALUES(:valutazione,:descrizione,:id_film);";
        $statement= $conn->prepare($sql);
        $statement->bindparam(":valutazione",$valutazione);
        $statement->bindparam(":descrizione",$descrizione);
        $statement->bindparam(":id_film",$id_film);
        $sql="SELECT recensione.id FROM recensione;";
       $statement= $conn->prepare($sql);
       $statement ->execute();
       $result = $statement->fetchAll();
       $id_recensione;
       foreach($result as $row){
        $id_recensione=$row["id"];
       } 
       /*$sql="UPDATE film SET film.id_recensione=" . $id_recensione . " WHERE film.id= " . $id_film. ";";
       $statement= $conn->prepare($sql);
       $statement ->execute();*/
       header("location:database_film.php");
    }
}
?>