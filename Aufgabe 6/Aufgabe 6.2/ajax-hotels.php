<?php
    $suche = utf8_decode($_REQUEST["q"]);
    $mysqli = new mysqli("dbs.hs-furtwangen.de", "TestUser", "*******", "prof_taube");
    $sql = "SELECT * FROM flughafen WHERE `stadtname` = '$suche' LIMIT 5";
    $result = $mysqli->query($sql);
    while($row = mysqli_fetch_object($result)) {
        $flughafen = $row->idflughafen;
    }

    $sql = "SELECT * FROM hotel WHERE `idflughafen` = '$flughafen'";
    $result = $mysqli->query($sql);
    while($row = mysqli_fetch_object($result)) {
        echo '<option value="1">'.utf8_encode($row->hotelname).'</option>';
    }
?>
