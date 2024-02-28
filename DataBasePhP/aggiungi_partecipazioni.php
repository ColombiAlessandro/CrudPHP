<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<form action="aggiunta_database.php?database=partecipazioni" method="post">
<label for="exampleFormControlSelect1">Attore</label>
    <select class="form-control" id="exampleFormControlSelect1" name="id_attore">
      <?php
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
        echo "<option value='" . $row["id"] . "'>". $row["nome"] . " ". $row["cognome"] ."</option>";
       }
      ?>

    </select>
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
        echo "<option value='" . $row["id"] . "'>". $row["nome"] ."</option>";
       }
      ?>
       
    </select>
    <button type="submit" class="btn btn-primary">Conferma</button>  
    
</form>
<form action="partecipazioni.php">
        <button type="submit">Indietro</button>
</form>
</html>