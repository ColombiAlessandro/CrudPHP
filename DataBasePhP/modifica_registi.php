<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <?php
    $servername="localhost";
    $username= "programma";
    $password= "12345";
    session_start();
    $id=$_POST["id"];
    $_SESSION["id_regista"]=$id;
    $conn = new PDO("mysql:host=$servername;dbname=cinematografia", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="SELECT registi.id, registi.nome,registi.cognome,registi.data_di_nascita,registi.data_di_morte FROM registi;";
    $statement= $conn->prepare($sql);
    $statement ->execute();
    $result = $statement->fetch();
    
    ?>
    <form action="modifica_database.php?database=registi" method="post">
    <label>Nome attore</label>
    <?php
    echo"<input class='form-control' type='text' placeholder='Disabled input' aria-label='Disabled input example' value=". $id ." name='id' disabled>";
    echo"<input class='form-control' type='text' placeholder='Default input' value=". $result["nome"]." name='nome_regista' required>";
    ?>
    <label>Cognome attore</label>
    <?php
    echo"<input class='form-control' type='text' placeholder='Default input' value=".$result["cognome"]." name='cognome_regista' required>";
    ?>
    <label>Data di nascita</label> <br>
    <?php
    echo"<input type='date' id='data' value=".$result["data_di_nascita"]." name='data_nascita' required> <br>";
    ?>
    <label>Data di morte</label><br>
    <input type="date" id="data" name="data_morte"> <br> <br>
    <button type="submit" class="btn btn-primary">Modifica</button> 
    </form>
    <form action="database_registi.php">
    <button type="submit">Indietro</button>
    </form>
</html>