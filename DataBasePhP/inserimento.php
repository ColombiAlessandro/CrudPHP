<?php
$conn = new PDO("mysql:host=localhost;dbname=cinematografia","programma", "12345");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$utente= $_REQUEST["nuovo_utente"];
$password=$_REQUEST["nuova_pswd"];
$sql="INSERT INTO login (nome_utente,password) VALUES(:utente,:password);";
$statement= $conn->prepare($sql);
$statement->bindparam(":utente",$utente);
$statement->bindparam(":password",$password);
$statement ->execute();
$result = $statement->fetchAll();
header("location:index.html")
?>