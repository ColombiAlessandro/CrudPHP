<html>
<head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <table style="border:1px solid black" class="table table-striped">
        <tr style="border:1px solid black">
            <th style="border:1px solid black">Nome Attore</th>
            <th style="border:1px solid black">Cognome Attore</th>
            <th style="border:1px solid black">Film</th>
        </tr>
        <?php
        $servername="localhost";
        $username= "programma";
        $password= "12345";
        try{
            $conn = new PDO("mysql:host=$servername;dbname=cinematografia", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="SELECT attori.nome as nomeAttore,attori.cognome as cognomeAttore,film.nome as Film FROM (partecipazioni join film on film.id=partecipazioni.id_film) join attori on partecipazioni.id_attore=attori.id;";
            $statement= $conn->prepare($sql);
            $statement ->execute();
            $result = $statement->fetchAll();
            foreach($result as $row){
                echo "<tr style='border:1px solid black'>";
                echo "<th style='border:1px solid black'>";
                echo $row['nomeAttore']."</th>"; 
                echo "<th style='border:1px solid black'>";
                echo $row['cognomeAttore']."</th>";
                echo "<th style='border:1px solid black'>";
                echo $row['Film']."</th>";
            }
        } catch(PDOException $e){
            echo $e ->__toString();
        }
        echo"";
        ?>
       
    </table>
    <form action="database_attori.php">
            <button type="submit">Attori</button>
    </form>
    <form action="database_registi.php">
            <button type="submit">Registi</button>
    </form>
    <form action="database_film.php">
            <button type="submit">Film</button>
    </form>
    <form action="database_recensioni.php">
            <button type="submit">Recensioni</button>
    </form>
</html>