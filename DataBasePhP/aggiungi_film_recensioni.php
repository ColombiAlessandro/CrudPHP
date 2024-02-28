<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<form action="aggiunta_database.php?database=film_recensioni" method="post">
<label>Nome film</label>
<input class="form-control" type="text" placeholder="Default input" name="nome_film" required>
<label>Durata</label>
<input type="number" id="numero" name="durata" min="1" max="10" step="1" required>
<label>Genere</label>
<input class="form-control" type="text" placeholder="Default input" name="genere" required>
<label>Data di uscita</label> <br>
<input type="date" id="data" name="data_uscita" required> <br>
<label>Regista</label>
<select class="form-control" id="exampleFormControlSelect1" name="id_regista">
      <?php
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
      ?>
</select>
<label for="numero">Valutazione film</label>
<input type="number" id="numero" name="valutazione" min="1" max="10" step="1" required>
<label>Descrizione</label>
<textarea class="form-control" id="exampleFormControlTextarea1" name="descrizione" rows="3" required></textarea>
<button type="submit" class="btn btn-primary">Conferma</button>
</form>
<form action="database_film.php">
<button type="submit">Indietro</button>
</form>
</html>