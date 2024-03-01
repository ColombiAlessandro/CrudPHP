<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<?php
session_start();
$id=$_POST["id"];
$_SESSION["id_film"]=$id;
$servername="localhost";
$username= "programma";
$password= "12345";
$conn = new PDO("mysql:host=$servername;dbname=cinematografia", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql="SELECT film.id_regista, film.id, recensione.valutazione, recensione.descrizione, film.id_recensione, film.nome, film.durata, film.genere, registi.nome as nomeRegista, registi.cognome as cognomeRegsita FROM (film join registi on film.id_regista=registi.id) left join recensione on film.id_recensione=recensione.id;";
$statement= $conn->prepare($sql);
$statement ->execute();
$result = $statement->fetch();
?>
<form action="modifica_database.php?database=film" method="post">

<label>Nome film</label>
<?php
echo"<input class='form-control' type='text' placeholder='Default input' name='nome_film' required value='".$result["nome"] ."'>";
?>
<label>Durata</label>
<?php
echo"<input type='number' id='numero' name='durata' min='1' max='10' step='1' required value='".$result["durata"] ."'>";
?>
<label>Genere</label>
<?php
echo"<input class='form-control' type='text' placeholder='Default input' name='genere' required value='".$result["genere"] ."'>";
?>
<label>Regista</label>
<?php
echo"<select class='form-control' id='exampleFormControlSelect1' name='id_regista' value='".$result["id_regista"] ."'>";
      
       $servername="localhost";
       $username= "programma";
       $password= "12345";
       $conn = new PDO("mysql:host=$servername;dbname=cinematografia", $username, $password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql="SELECT registi.id, registi.nome, registi.cognome FROM registi;";
       $statement= $conn->prepare($sql);
       $statement ->execute();
       $result = $statement->fetchAll();
       foreach($result as $row){
        echo "<option value='" . $row["id"] . "'>". $row["nome"] . " ". $row["cognome"] ."</option>";
       }
       
echo"</select>";
?>
<button type="submit" class="btn btn-primary">Conferma</button>
</form>
<form action="database_film.php">
<button type="submit">Indietro</button>
</form>
</html>