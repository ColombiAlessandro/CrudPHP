<html>
    
    <table style="border:1px solid black">
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
</html>