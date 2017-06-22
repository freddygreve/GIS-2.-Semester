<?php
    $suche = utf8_decode($_REQUEST["q"]);
    $dir = $_REQUEST["dir"];
    if ($dir == "von") {
        $prefix = "Von: ";
    } else {
        $prefix = "Nach: ";
    }
    $mysqli = new mysqli("dbs.hs-furtwangen.de", "TestUser", "TestGIS", "prof_taube");
    $sql = "SELECT * FROM flughafen WHERE `stadtname` REGEXP '$suche' LIMIT 5";
    $result = $mysqli->query($sql);
    while($row = mysqli_fetch_object($result)) {
        echo '<div class="list" onclick="setvalue(\'input-'.$dir.'\', \''.utf8_encode($row->stadtname).'\', \''.$prefix.'\')">'.utf8_encode($row->stadtname).'</div>';
    }
?>
