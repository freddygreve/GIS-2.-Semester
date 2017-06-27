<?php
    $suche = utf8_decode($_REQUEST["city"]);
    $mysqli = new mysqli("dbs.hs-furtwangen.de", "TestUser", "TestGIS", "prof_taube");
    $sql = "SELECT * FROM hotel WHERE `idflughafen` = '$suche'";
    $result = $mysqli->query($sql);
    while($row = mysqli_fetch_object($result)) {
        echo '<option value="'.$row->idhotel.'">'.utf8_encode($row->hotelname).'</option>';
    }
?>
