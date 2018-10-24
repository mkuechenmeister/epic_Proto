<?php
    if(isset($_SESSION['username'])){
        include_once("inc/nav2.php");
    }else {
        include_once "inc/nav1.php";
        $visible=false;
    }
    ?>
<div class="main">

<p class=MsoTitle>Bildverwaltungstool</p>

<p class=MsoNormal>&nbsp;</p>

<h1>Problemstellung</h1>

<h3>Deine Rolle</h3>

<p class=MsoNormal>Du bist Webentwickler bei der Firma Image Solution Tirol.</p>

<p class=MsoNormal>&nbsp;</p>

<h3>Die Situation</h3>

<p class=MsoNormal>Es soll eine eigenständige webbasierte Applikation für die Ablage
    von Bildern erstellt werden. Die Bilder sollen beim Upload automatisch skaliert
    (d.h. Größenanpassung) werden. </p>

<p class=MsoNormal>&nbsp;</p>

<h3>Dein Ziel</h3>

<p class=MsoNormal>Dein Chef hat dich beauftragt einen funktionsfähigen
    Prototyp für die Verwaltung von Bildern zu erstellen. Benutzer müssen sich
    zuvor registrieren. Der Upload wird später nur für registrierte Benutzer
    möglich sein. </p>

<h3>&nbsp;</h3>

<h3>Deine Zielgruppe</h3>

<p class=MsoNormal>Die Software soll nach erfolgreichen Tests veröffentlich und
    der Community kostenlos zur Verfügung gestellt werden. Da die
    Entwickler-Community vor der Freigabe einen kritischen Blick auf den Code
    werfen wird, muss dieser allen aktuellen Regeln und Standards entsprechen. </p>

<p class=MsoNormal>&nbsp;</p>

<h3>Das erwartete Produkt </h3>

<h4>Funktionen</h4>

<p class=MsoNormal>Registrierungsformular:</p>

<p class=MsoListParagraphCxSpFirst style='text-indent:-18.0pt'><span
        style='font-family:Symbol'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span>Formular zur Eingabe von Benutzername und Passwort (2 x). Die
    eingegeben Werte sollen client- und serverseitig Validiert werden. Insbesondere
    soll das Passwort hinsichtlich Korrektheit und Sicherheit analysiert werden:</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:72.0pt;text-indent:-18.0pt'><span
        style='font-family:"Courier New"'>o<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;
</span></span>Übereinstimmung der beiden Passworteingaben </p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:72.0pt;text-indent:-18.0pt'><span
        style='font-family:"Courier New"'>o<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;
</span></span>Minimale Länge von 6 Zeichen</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:72.0pt;text-indent:-18.0pt'><span
        style='font-family:"Courier New"'>o<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;
</span></span>Verwendung von Zahlen und Buchstaben</p>

<p class=MsoListParagraphCxSpLast><b><u>Hinweis</u></b>: Verwende für die
    Analyse <b>reguläre Ausdrucke.</b> Erstelle eine Ampelfunktion für die
    Visualisierung der Passwortstärke. </p>

<p class=MsoNormal>Bildupload:</p>

<p class=MsoListParagraphCxSpFirst style='text-indent:-18.0pt'><span
        style='font-family:Symbol'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span>Formular für den Upload von Bildern inkl. Angabe von Titel und
    Ersteller, die Informationen werden in einer Textdatei gespeichert.</p>

<p class=MsoListParagraphCxSpMiddle style='text-indent:-18.0pt'><span
        style='font-family:Symbol'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span>Skaliere das Bild auf eine maximale Höhe von 200 und 1000 Pixeln
    (mit entsprechender resultierender Breite). Prüfe zuvor, ob das Ausgangsbild
    eine minimale Höhe von 1000 Pixeln aufweist. <br>
    <b><u>Hinweis</u></b>: Verwende für die Bildbearbeitung die PHP Bibliothek
    ImageMagick. <br>
    Beispiel siehe <span class=MsoHyperlink><a
            href="http://php.net/manual/en/book.imagick.php">http://php.net/manual/en/book.imagick.php</a></span>
</p>

<p class=MsoListParagraphCxSpLast>Installation in XAMPP: <span
        class=MsoHyperlink><a
            href="https://ourcodeworld.com/articles/read/349/how-to-install-and-enable-the-imagick-extension-in-xampp-for-windows">https://ourcodeworld.com/articles/read/349/how-to-install-and-enable-the-imagick-extension-in-xampp-for-windows</a></span>
</p>

</div>


<?php
    include_once "footer.php";
    ?>