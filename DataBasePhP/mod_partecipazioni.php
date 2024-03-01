<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<?php
    session_start();
    $id_filmP=$_POST["idFilm"];
    $id_attoreP=$_POST["idAttore"];
    $_SESSION["id_filmP"]=$id_filmP;
    $_SESSION["id_attoreP"]=$id_attoreP;
    $servername="localhost";
    $username= "programma";
    $password= "12345";
     $conn = new PDO("mysql:host=$servername;dbname=cinematografia", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql="SELECT partecipazioni.id_attore, partecipazioni.id_film, attori.nome as nomeAttore,attori.cognome as cognomeAttore,film.nome as Film FROM (partecipazioni join film on film.id=partecipazioni.id_film) join attori on partecipazioni.id_attore=attori.id;";
     $statement= $conn->prepare($sql);
     $statement ->execute();
     $result = $statement->fetchAll();
?>
<form action="modifica_database.php?database=partecipazioni" method="post">

<label for="exampleFormControlSelect1">Attore</label>
<?php
    echo"<select class='form-control' id='exampleFormControlSelect1' name='id_attore'>";
      
       $servername="localhost";
       $username= "programma";
       $password= "12345";
       $conn = new PDO("mysql:host=$servername;dbname=cinematografia", $username, $password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql="SELECT attori.id, attori.nome,attori.cognome FROM attori;";
       $statement= $conn->prepare($sql);
       $statement ->execute();
       $result = $statement->fetchAll();
       foreach($result as $row){
        echo "<option value='" . $row["id"] . "'";
        if( $row["id"] == $id_attoreP){
            echo " selected";
        }
        echo">". $row["nome"] . " ". $row["cognome"];
        echo"</option>";
       }
      

    echo"</select>";
    ?>
    <label for="exampleFormControlSelect1">Film</label>
    <select class="form-control" id="exampleFormControlSelect1" name="id_film">
      <?php
       $servername="localhost";
       $username= "programma";
       $password= "12345";
       $conn = new PDO("mysql:host=$servername;dbname=cinematografia", $username, $password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql="SELECT film.id, film.nome FROM film;";
       $statement= $conn->prepare($sql);
       $statement ->execute();
       $result = $statement->fetchAll();
       foreach($result as $row){
        echo "<option value='" . $row["id"] . "'";
        if( $row["id"] == $id_filmP){
            echo " selected";
        }
        echo ">". $row["nome"];
        echo "</option>";
       }
      ?>
       
    </select>
    <button type="submit" class="btn btn-primary">Conferma</button>  
    
</form>
<form action="partecipazioni.php">
        <button type="submit">Indietro</button>
</form>
</html>