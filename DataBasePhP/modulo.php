<?php
session_start();
$utente=$_REQUEST["utente"];
$pswd=$_REQUEST["pswd"];
$servername="localhost";
$username="programma";
$password="12345";
$conn = new PDO("mysql:host=$servername;dbname=cinematografia", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql="SELECT login.username, login.password FROM login;";
$statement= $conn->prepare($sql);
$statement ->execute();
$result = $statement->fetchAll();
if($utente=="Alessandro" && $pswd=="Colombi")
{
    $_SESSION["utente"]=$utente;
    header("location:database_attori.php");
    exit();
} else {
    $_SESSION["utente"]="";
    echo "errore grave";
}
?>