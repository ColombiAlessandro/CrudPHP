<html>
<head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <div style="float:left">
    <form action="database_attori.php">
            <button type="submit">Attori</button>
    </form>
    </div>
    <div style="float:left">
    <form action="database_registi.php">
            <button type="submit">Registi</button>
    </form>
    </div>
    <div style="float:left">
    <form action="database_film.php">
            <button type="submit">Film</button>
    </form>
    </div>
    <div style="float:left">
    <form action="partecipazioni.php">
            <button type="submit">Partecipazioni</button>
    </form>
    </div>
    <table style="border:1px solid black" class="table table-striped">
        <tr style="border:1px solid black">
            <th style="border:1px solid black">Valutazione</th>
            <th style="border:1px solid black">Descrizione</th>
            <th style="border:1px solid black">Film</th>
            <th style="border:1px solid black">Altro</th>
        </tr>
        <?php
        $servername="localhost";
        $username= "programma";
        $password= "12345";
        try{
            $conn = new PDO("mysql:host=$servername;dbname=cinematografia", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="SELECT recensione.id_film, recensione.id, recensione.valutazione, recensione.descrizione, film.nome FROM recensione join film on recensione.id_film=film.id;";
            $statement= $conn->prepare($sql);
            $statement ->execute();
            $result = $statement->fetchAll();
            foreach($result as $row){
                echo "<tr style='border:1px solid black'>";
                echo "<th style='border:1px solid black'>";
                echo $row['valutazione']."</th>"; 
                echo "<th style='border:1px solid black'>";
                echo $row['descrizione']."</th>";
                echo "<th style='border:1px solid black'>";
                echo $row['nome']."</th>";
                echo "<th style='border:1px solid black'>";
                echo "<form action='elimina_database.php?database=recensioni' method='post'><div name='id_film' value=". $row["id_film"]."><button type='submit' class='tn btn-primary' value='". $row["id"]."' name='id'>Elimina</button></div></form>";
                echo"</th>";
                echo "</tr>";
            }
        } catch(PDOException $e){
            echo $e ->__toString();
        }
        echo"";
        ?>
       
    </table>
    <form action="aggiungi_film_recensioni.php">
        <button type="submit">Aggiungi</button>
       </form>    
</html>