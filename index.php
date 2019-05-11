<?php

if (isset($_GET['a'])) {
    $a = $_GET['a'];
} else {
    $a = "home";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Docker engine test</title>
    <style>
        a {
            text-decoration: none;
        }
        a:hover{
            color: orange;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <p>Here we will test the docker engine. Prototype for KNIME containers</p>
    <div>
        <table style="border-bottom: 4px solid orange">
            <tr>
                <td><a href="?a=home">Home</a></td>
                <td><a href="?a=create">Create</a></td>
                <td><a href="?a=start">Start</a></td>
                <td><a href="?a=logs">Logs</a></td>
                <td><a href="?a=stop">Stop</a></td>
                <td><a href="?a=remove">Remove</a></td>
                <td><a href="?a=prune" onclick=confirm("Sure?")>Prune</a></td>
            </tr>
        </table>
        <?php
        exec("./$a.sh", $output);
        ?>
        <div class="border: 1px solid black">
            <div>
                <pre><?= @implode("\n", $output) ?></pre></div>
        </div>
    </div>
</body>

</html>