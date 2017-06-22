<html>
    <head>
        <title>Urlaub buchen</title>
        <meta charset="utf-8">
        <script type="text/javascript">
            function remove_prefix (input, prefix) {
                var text = input.value.substr(prefix.length);
                input.value = text;
            }
            function setvalue (id, text, prefix) {
                if (!prefix) {
                    var prefix = "";
                }
                if (!text) {
                    document.getElementById(id).value = prefix+document.getElementById(id).value;
                } else {
                    document.getElementById(id).value = prefix+text;
                }
                document.getElementById("ajax-von").style.display = "none";
                document.getElementById("ajax-nach").style.display = "none";
                
                if(id == "input-nach") {
                    var xmlhttp=new XMLHttpRequest();
                    xmlhttp.onreadystatechange=function() {
                        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                            document.getElementById("input-hotels").disabled = false;
                            document.getElementById("input-hotels").innerHTML=xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET","ajax-hotels.php?q="+text);
                    xmlhttp.send();
                }
            }
            
            function ajax_von (element) {
                document.getElementById("ajax-von").style.display = "block";
                var suchwort = element.value;
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                        document.getElementById("ajax-von").innerHTML=xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET","ajax-flughafen.php?q="+suchwort+"&dir=von");
                xmlhttp.send();
            }
            
            function ajax_nach (element) {
                document.getElementById("ajax-nach").style.display = "block";
                var suchwort = element.value;
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                        document.getElementById("ajax-nach").innerHTML=xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET","ajax-flughafen.php?q="+suchwort+"&dir=nach");
                xmlhttp.send();
            }
            function checkdatum () {
                var hin_tag = document.getElementById("hin-tag").value;
                var hin_monat = document.getElementById("hin-monat").value - 1;
                var hin_jahr = document.getElementById("hin-jahr").value;
                var hin = new Date(hin_jahr, hin_monat, hin_tag);
                var zuruck = new Date(hin.getTime() + 7 * 24 * 60 * 60 * 1000);
                console.log("Hin: "+hin_tag+"."+hin_monat+"."+hin_jahr);
                console.log(hin.toString());
                console.log(zuruck.toString());
                document.getElementById("zuruck-tag").value = zuruck.getDate();
                document.getElementById("zuruck-monat").value = zuruck.getMonth() + 1;
                document.getElementById("zuruck-jahr").value = zuruck.getFullYear();
            }
            window.onload = function () {
                var position = document.getElementById("input-von").getBoundingClientRect();
                document.getElementById("ajax-von").style.left = position.left;
                document.getElementById("ajax-von").style.top = position.bottom;
                
                var position = document.getElementById("input-nach").getBoundingClientRect();
                document.getElementById("ajax-nach").style.left = position.left;
                document.getElementById("ajax-nach").style.top = position.bottom;
                
                var heute = new Date();
                document.getElementById("hin-tag").value = heute.getDate();
                document.getElementById("hin-monat").value = heute.getMonth() + 1;
                document.getElementById("hin-jahr").value = heute.getFullYear();
                checkdatum();
            }
        </script>
        <style type="text/css">
            * {
                margin: 0px;
                padding: 0px;
            }
            .ajaxbox {
                width: 240px;
                background: green;
                position: absolute;
                top: 0px;
                left: 0px;
                display: none;
            }
            .list {
                width: 100%;
                padding: 5px;
                background: #eee;
                cursor: pointer;
            }
            .list:hover {
                background: #ff9898;
            }
            .row {
                border: 1px solid #000;
                margin-left: 3%;
                margin-top: 3%;
                padding: 15px;
                width: 250px;
            }
            td {
                border: 1px solid #eee;
            }
            
            input {
                width: 100%;
                border: 1px solid #9f9f9f;
                border-top: none;
                padding: 5px;
            }
            
            .first {
                border-top: 1px solid #9f9f9f;
            }
            
            .last {
                margin-bottom: 20px;
            }
            
            select {
                border: 1px solid #9f9f9f;
                background: #fff;
                padding-top: 5px;
                padding-bottom: 5px;
                margin: -1px;
            }
        </style>
    </head>
    <body>
        <div id="ajax-von" class="ajaxbox"></div>
        <div id="ajax-nach" class="ajaxbox"></div>
        <div class="row">
            <input type="text" id="input-von" placeholder="Von: " class="first" onkeydown="ajax_von(this)">
            <input type="text" id="input-nach" placeholder="Nach: " class="last" onkeydown="ajax_nach(this)">
            <select style="width: 100%" class="last" id="input-hotels" disabled>
                <option>Hotel: Bitte erst Zielort festlegen</option>
            </select>
            <p>Datum hin:</p>
            <select style="width: 33%" id="hin-tag" onchange="checkdatum()">
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
                <option value="6">06</option>
                <option value="7">07</option>
                <option value="8">08</option>
                <option value="9">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
            <select style="width: 33%" id="hin-monat" onchange="checkdatum()">
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
                <option value="6">06</option>
                <option value="7">07</option>
                <option value="8">08</option>
                <option value="9">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            <select style="width: 33%" class="last" id="hin-jahr" onchange="checkdatum()">
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
            </select>
            <p>Datum zurück:</p>
            <select style="width: 33%" id="zuruck-tag">
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
                <option value="6">06</option>
                <option value="7">07</option>
                <option value="8">08</option>
                <option value="9">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
            <select style="width: 33%" id="zuruck-monat">
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
                <option value="6">06</option>
                <option value="7">07</option>
                <option value="8">08</option>
                <option value="9">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            <select style="width: 33%" class="last" id="zuruck-jahr">
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
            </select>
        </div>
    </body>
</html>
