

<!-- saved from url=(0040)http://fred-dienste.de/GIS/aufgabe5.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <script type="text/javascript">
            function checkmail (elem) {
                if(elem.value.indexOf("@") == -1) {
                    alert("Ungültige E-Mail adresse");
                    return;
                }
                var splits = elem.value.split("@");
                if (splits[0].length < 1) {
                    alert("Ungültige E-Mail adresse");
                    return;
                }
                if (splits[1].length < 4) {
                    alert("Ungültige E-Mail adresse");
                    return;
                }
            }
            
            function checkgeb (elem) {
                var splits = elem.value.split(".");
                var gebtag = splits[0];
                var gebmon = splits[1];
                var gebjah = splits[2];
                var gebdate = new Date (gebjah,gebmon-1,gebtag);
                var heute = new Date();
                if (heute < new Date( gebdate.getFullYear() + 18, gebdate.getMonth(), gebdate.getDate() )) {
                    alert("Sorry, zu jung.");
                    return;
                }
            }
            
            function submit () {
                var anrede = document.getElementById("anrede").value;
                var vorname = document.getElementById("vorname").value;
                var nachname = document.getElementById("name").value;
                var gebdatum = document.getElementById("geb").value;
                var mail = document.getElementById("mail").value;
                var anliegen = document.getElementById("anliegen").value;
                document.body.innerHTML = "";
                if (anrede == "Frau") {
                    document.body.innerHTML += "<p>Sehr geehrte Frau "+vorname+" "+nachname+"</p>";
                } else {
                    document.body.innerHTML += "<p>Sehr geehrter Herr "+vorname+" "+nachname+"</p>";
                }
                document.getElementById("formular").submit();
            }
        </script>
    </head>
    <body>
        <form method="post" action="verarbeitung.php" id="formular">
        <table>
            <tbody><tr>
                <td>Anrede:</td>
                <td>
                    <select id="anrede" name="anrede">
                        <option value="Herr">Herr</option>
                        <option value="Frau">Frau</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><input type="text" id="name" placeholder="Name" value="Greve" name="name"></td>
            </tr>
            <tr>
                <td>Vorname:</td>
                <td><input type="text" id="vorname" placeholder="Vorname" value="Frederik" name="vorname"></td>
            </tr>
            <tr>
                <td>Geburtsdatum:</td>
                <td><input type="text" id="geb" placeholder="Geburtsdatum" onchange="checkgeb(this)" value="25.10.1997" name="geb"></td>
            </tr>
            <tr>
                <td>E-Mail Adresse:</td>
                <td><input type="text" id="mail" placeholder="E-Mail Adresse" onchange="checkmail(this)" value="info@fred-dienste.de" name="mail"></td>
            </tr>
            <tr>
                <td>Anliegen:</td>
                <td><textarea id="anliegen" name="anliegen">Bla bla bla</textarea></td>
            </tr>
        </tbody></table>
        <button onclick="submit()"> Senden </button>
        </form>
    
    </body>
</html>
