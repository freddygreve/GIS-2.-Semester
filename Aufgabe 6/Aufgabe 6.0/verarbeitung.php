<?php
    $anrede = $_POST["anrede"];
    if ($anrede == "Herr") {
        $anrede = "geehrter Herr";
    } else {
        $anrede = "geehrte Frau";
    }
    $name = $_POST["name"];
    $vorname = $_POST["vorname"];
    $geb = $_POST["geb"];
    $mail = $_POST["mail"];
    $anliegen = $_POST["anliegen"];
?>
<html>
    <head>
        <meta charset="utf-8">
        <style type="text/css">
            html {
                background: #d0d0d0;
            }
        </style>
    </head>
    <body>
        <p>
            Sehr <?php echo $anrede.' '.$vorname.' '.$name; ?> <br>
            Sie haben folgende persönliche Daten übermittelt:<br>
            Geburtsdatum: <?php echo $geb; ?><br>
            E-Mail-Adresse: <?php echo $mail; ?><br>
            Ihr Anliegen: <?php echo $anliegen; ?><br>
        </p>
    </body>
</html>
