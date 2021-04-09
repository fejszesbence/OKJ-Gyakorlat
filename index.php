<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="feldolgoz.js" type="text/javascript"></script>
        <link href="stilus.css" rel="stylesheet" type="text/css"/>
        <title>OKJ Gyakorlás</title>
    </head>
    <body>
        <main>
            <h1 id="cim">Teendők</h1>
            <form id="urlap" action="" method="post">
                <h2 id="TODOcim">TODO lista</h2>
                <button onclick="betolt()" id="TODObetolt" name="TODObetolt" type="button">Betölt</button>
                <input id="TODOnev" name="TODOnev" type="text">
                <input id="TODOdatum" name="TODOdatum" type="date">
                <button onclick="teendoHozzaad()" id="TODOadd" name="TODOadd" type="button">Add</button>
                <select onchange="rendez(this.value)" id="TODOselect">
                    <option value="todo">todo</option>
                    <option value="datum">datum</option>
                </select>
                <ul id="TODOlista">
                </ul>
            </form>
            <p id="nev">Fejszés Bence Dániel</p>
        </main>
    </body>
</html>
