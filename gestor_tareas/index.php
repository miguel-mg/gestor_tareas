<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tareas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content" >
        <div id="info" class="hide">
            <span id="info-msg" >
                debuggg
            </span>
        </div>
        <span id="title">Gestor de tareas</span>
        <hr>
        <table class="tb-elem">
            <tbody>
                <tr>
                    <td ><div style="margin-right:10px;"><input id="in-title" type="text"></div></td>
                    <td nowrap><input type="checkbox"  id="ch-php">
                        <label>PHP</label>
                    </td>
                    <td nowrap><input type="checkbox" id="ch-js">
                        <label>Javascript</label>
                    </td>
                    <td nowrap><input type="checkbox" id="ch-css" >
                        <label>CSS</label>
                    </td>
                    <td style="text-align:right;">
                        <button id="btn-add" type="button" >Añadir</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="tb-tasks">
            <thead>
                <th>Tarea</th>
                <th>Categorías</th>
                <th>Acciones</th>
            </thead>
            <tbody id="results">

            </tbody>
        </table>


    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="script.js"></script>
</body>
</html>