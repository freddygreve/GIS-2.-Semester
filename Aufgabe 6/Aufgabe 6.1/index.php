<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <form method="post" action="#">
            <input type="text" placeholder="Suchwort" name="suche">
            <button type="submit">Suchen</button>
        </form>
        <?php
            if ($_POST["suche"] == "") {
                exit();
            }
            $suche = utf8_decode($_POST["suche"]);
            $db = mysqli_connect("dbs.hs-furtwangen.de", "TestUser", "TestGIS", "prof_taube") or die("Unable to connect with Database");
            $abfrage = "SELECT * FROM teilnehmer WHERE `NAME` REGEXP '$suche'";
            $ergebnis = mysqli_query($db, $abfrage);
            $anzahl = mysqli_num_rows($ergebnis);
            echo "$anzahl Treffer<br>";
            echo "<table>";
            while($row = mysqli_fetch_object($ergebnis)) {
                echo '<tr>';
                foreach ($row as $field) {
                    echo '<td>'.utf8_encode($field).'</td>';
                }
                echo '</tr>';
            }
            echo "</table>";
        ?>
    </body>
</html>
