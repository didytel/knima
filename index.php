<?php

if (isset($_GET['a'])) {
    $a = $_GET['a'];
} else {
    $a = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Docker engine test</title>
</head>

<body>
    <p>Here we will test the docker engine. Prototype for KNIME containers</p>
    <div>
        <table>
            <tr>
                <td><a href="?a=create">Create</a></td>
                <td><a href="?a=start">Start</a></td>
                <td><a href="?a=logs">Logs</a></td>
                <td><a href="?a=remove">Remove</a></td>
            </tr>
        </table>
        <?php
        switch ($a) {
            case "create":
                exec("./create.sh",$output);
                break;
            case "start":
                exec("./start.sh",$output);
                break;
            case "logs":
                exec("./logs.sh",$output);
                break;
            case "remove":
                exec("./remove.sh",$output);
                break;
        }

        ?>
        <div class="border: 1px solid black">
            <div>Output..</div>
            <div><?=@implode($output)?></div>
        </div>
    </div>
</body>

</html>