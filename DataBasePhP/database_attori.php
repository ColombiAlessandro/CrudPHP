<html>
<table style="border:1px solid black">
        <tr style="border:1px solid black">
            <th style="border:1px solid black">Nome</th>
            <th style="border:1px solid black">Durata</th>
            <th style="border:1px solid black">Genere</th>
            <th style="border:1px solid black">Nome Attori</th>
            <th style="border:1px solid black">Cognome Attori</th>
        </tr>
        <?php
        $servername="localhost";
        $username= "programma";
        $password= "12345";
        try{
            $conn = new PDO("mysql:host=$servername;dbname=cinematografia", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="SELECT attori.nome,attori.cognome,attori.data_di_nascita,attori.data_di_morte FROM attori;";
            $statement= $conn->prepare($sql);
            $statement ->execute();
            $result = $statement->fetchAll();
            foreach($result as $row){
                echo "<tr style='border:1px solid black'>";
                echo "<th style='border:1px solid black'>";
                echo $row['nome']."</th>"; 
                echo "<th style='border:1px solid black'>";
                echo $row['durata']."</th>";
                echo "<th style='border:1px solid black'>";
                echo $row['genere']."</th>";
                echo "<th style='border:1px solid black'>";
                echo $row['nomeRegista']."</th>";
                echo "<th style='border:1px solid black'>";
                echo $row['cognomeRegsita']."</th>";
                echo "</tr>";
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
    <form action="database_partecipazioni.php">
            <button type="submit">Partecipazioni</button>
    </form>
</html>