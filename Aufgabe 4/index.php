<!DOCTYPE html>
<html>
    <head>
        <title>
            FAQ zum DOM
        </title>
        <meta charset="utf-8">
        <style type="text/css">
            header {
                widows: 100%;
                background: #eb2f2f;
            }
        </style>
        <script type="text/javascript">
            function alleausblenden () {
                var elemente = document.getElementById("faq").children;
                for (i = 0; i<elemente.length; i++) {
                    if (elemente[i].className != "frage") {
                        elemente[i].style.display = "none";
                    }
                }
            }

            function einblenden(){
                var children = this.nextElementSibling;
                while (children.className != "frage") {
                    if (children.style.display == "block") {
                        children.style.display = "none";
                    } else {
                        children.style.display = "block";
                    }
                    children = children.nextElementSibling;
                }    
            }

            window.onload = function(){ 
                var fragen = document.getElementsByClassName("frage");
                for (i = 0; i<fragen.length; i++) {
                    console.log(i);
                    document.getElementsByClassName("frage")[i].addEventListener("click", einblenden, true);
                }
                var datum = new Date();
                document.body.innerHTML += "<p>"+datum.getDate()+"."+ (parseInt(datum.getMonth())+1) +"."+datum.getFullYear()+"</p>";
                document.body.innerHTML += '<img src="https://graph.facebook.com/100000603993850/picture?width=800">';
                var header = document.createElement("header");
                document.body.insertBefore(header, document.body.firstChild);
                document.getElementsByTagName("header")[0].innerHTML = "Das ist der header";
            }
        </script>
    </head>
    <body>
        <h1>
            Häufig gestellte Fragen zu Document Object Model (DOM)
        </h1>
        <button onclick="alleausblenden()"> Alle ausblenden </button>
       <div id="faq">
            <p class="frage">
                Welche unterschiedlichen Typen von DOM-Knoten gibt es?
            </p>
            <p>
				Insgesamt gibt es 12 verschiedene Typen von DOM-Knoten: (HTML-)Element, Attribut, 
				Text, Kommentar, ...
            </p>
            <p>
                Die internen Zeiger firstChild und nextSibling verweisen jeweils auf einen beliebigen
                Knoten ohne Rücksicht auf den Typ des Knotens. So kann firstChild auf das n&auml;chste HTML-Element
				verweisen, aber auch auf einen Text-Knoten (z.B. einen Zeilenumbruch) oder einen HTML-Kommentarknoten.
				F&uuml;r eine Abfrage auf die HMTL-Elemente m&uuml;sste man immer den Typ des Knotens abfragen.
			</p>
            <p>
				Im Gegensatz dazu verweisen die internen 
                Zeiger firstElementChild und nextElementSibling nur auf HTML-Elemente (also Knoten HTML-Tag
                repräsentieren) und nicht mehr z.B. auf Kommentare. 
            </p>
            <p class="frage">
                Wie h&auml;ngen HTML und der DOM-Baum zusammen?
            </p>
            <p>
                Der DOM-Baum ist die interne Repr&auml;sentation der HTML-Seite im Browser.
                Der Browser wandelt zunächst den HTML-Kode in den DOM-Baum um, wobei jedes
                HTML-Element zu einem DOM-Knoten wird.
            </p>
            <img src="html_dom.jpg" alt="Zusammenhang HTML-DOM-Browser">
            <p>
                Bei jeder Ver&auml;nderung des DOMs durchläuft der Renderer den DOM-Baum erneut
                und stellt die ge&auml;nderten Inhalte neu im Browser-Fenster dar.   </p>
            <p class="frage">
                Wie greife ich aus JavaScript auf die DOM-Knoten zu?
            </p>
            <p>
                Es gibt verschiedene Zugriffsmöglichkeiten:
            </p>    
            <pre>
                    document.getElementById(<id>)           // liefert 0 oder 1 Element
                    document.getElementsByName(<name>)      // liefert 0 oder 1 Element
                    document.getElementsByTagName(<tag>)    // liefert einen Array ggfs. vielen Elementen
                    document.getElementsByClassName(<class>)// liefert einen Array ggfs. vielen Elementen
            </pre>
            <p>
                Darüber hinaus kann man mit den internen Zeigern wie firstElementChild ... arbeiten.
            </p>
            <p> 
                Seit HTML5 gibt es auch ganz 2 neue Funktionen, die CSS-Selektoren als Parameter akzeptieren:
                <br>   
                querySelector() und querySelectorAll() 
                <br>
                akzeptieren einen CSS-Selektor als Parameter und geben die ausgew&auml;hlten Elemente als DOM-Elemente zurück. 
                querySelector gibt das erste gefundene Element zurück, querySelectorAll gibt alle gefundenen Elemente zurück.
            </p>
        <p class="frage">
               Weitere Infos?
        </p>
        <p>
        Eine sch&ouml;ne Seite mit Erkl&auml;rungen und Beispielen finden Sie unter
        <a href="http://www.mediaevent.de/javascript/DOM-Knoten-suchen.html">DOM-Beispiele</a>
        </p>
           </div>
		<p> Ende der FAQ</p>        
        <div id="clickmich" >
                <p id="220">Die wichtigsten Knotentypen und die Werte des nodeType finden Sie in der folgenden Tabelle</p>
                <table id="221" border="1">
                    <tr id="2211">
                        <td id="22111">Typ</td><td id="22112">Wert</td>
                    </tr>
                    <tr id="2212">
                        <td id="22121">Element</td><td id="22122">1</td>
                    </tr>
                    <tr id="2213">
                        <td id="22131">Attribut</td><td id="22132">2</td>
                    </tr>
                    <tr id="2214">
                        <td id="22141">Text</td><td id="22142">3</td>
                    </tr>
                </table>
                <p id="222">Knotentypen und deren Werte im DOM</p>
        </div>
        <div id="ausgabe"></div>
</html>
