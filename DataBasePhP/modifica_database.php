<?php
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
        $sql="UPDATE attori SET nome = ". $nome .", cognome =". $cognome . ", data_di_nascita = ". $data_di_nascita .", data_di_morte = " . $data_di_morte ." WHERE id = ". $id_attore .";";
        $statement= $conn->prepare($sql);
        $statement ->execute(); 
        header("location:database_attori.php");
    }
    if($tipo_database== "registi"){
        $id=$_POST["id"];
        $nome=$_POST["nome_regista"];
        $cognome=$_POST["cognome_regista"];
        $data_di_nascita=$_POST["data_nascita"];
        $data_di_morte=$_POST["data_morte"];
        $sql="UPDATE regista SET nome = ". $nome .", cognome =". $cognome . ", data_di_nascita = ". $data_di_nascita .", data_di_morte = " . $data_di_morte ." WHERE id = ". $id_attore .";";
        $statement= $conn->prepare($sql);
        $statement ->execute(); 
        header("location:database_attori.php");
    }
?>