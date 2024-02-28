<html>
    
    <table style="border:1px solid black">
        <tr style="border:1px solid black">
            <th style="border:1px solid black">Nome</th>
            <th style="border:1px solid black">Cognome</th>
            <th style="border:1px solid black">Data di Nascita</th>
            <th style="border:1px solid black">Data di Morte</th>
        </tr>
        <?php
        $servername="localhost";
        $username= "programma";
        $password= "12345";
        try{
            $conn = new PDO("mysql:host=$servername;dbname=cinematografia", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="SELECT registi.nome,registi.cognome,registi.data_di_nascita,registi.data_di_morte FROM registi;";
            $statement= $conn->prepare($sql);
            $statement ->execute();
            $result = $statement->fetchAll();
            foreach($result as $row){
                echo "<tr style='border:1px solid black'>";
                echo "<th style='border:1px solid black'>";
                echo $row['nome']."</th>"; 
                echo "<th style='border:1px solid black'>";
                echo $row['cognome']."</th>";
                echo "<th style='border:1px solid black'>";
                echo $row['data_di_nascita']."</th>";
                echo "<th style='border:1px solid black'>";
                echo $row['data_di_morte']."</th>";
                echo "</tr>";
            }
        } catch(PDOException $e){
            echo $e ->__toString();
        }
        echo"";
        ?>
       
    </table>
    <form action="database_film.php">
            <button type="submit">Film</button>
    </form>
    <form action="database_attori.php">
            <button type="submit">Attori</button>
    </form>
    <form action="database_partecipazioni.php">
            <button type="submit">Partecipazioni</button>
    </form>
</html>