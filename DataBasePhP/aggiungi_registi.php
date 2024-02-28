<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <form action="aggiunta_database.php?database=registi" method="post">
    <label>Nome registi</label>
    <input class="form-control" type="text" placeholder="Default input" name="nome_regista" required>
    <label>Cognome registi</label>
    <input class="form-control" type="text" placeholder="Default input" name="cognome_regista" required>
    <label>Data di nascita</label> <br>
    <input type="date" id="data" name="data_nascita" required> <br>
    <label>Data di morte</label><br>
    <input type="date" id="data" name="data_morte"> <br> <br>
    <button type="submit" class="btn btn-primary">Aggiungi</button> 
    </form>
    <form action="database_registi.php">
        <button type="submit">Indietro</button>
       </form>
</html>