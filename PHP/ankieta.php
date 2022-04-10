<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    if (isset($_POST["imie"])) { 
        $imie = strip_tags($_POST["imie"]); 
    } else {
        $imie = ""; 
    }
    if (isset($_POST["wiek"])) { 
        $wiek = strip_tags($_POST["wiek"]); 
    } else {
        $wiek = ""; 
    }
    if (isset($_POST["kwota"])) {
        $kwota = strip_tags($_POST["kwota"]); 
    } else {
        $kwota = ""; 
    }
    if (isset($_POST["va"])) { 
        $va = strip_tags($_POST["va"]);
    } else {
        $va = "1"; 
    }
    ?>

    <form method="post" action="ankieta.php">
        Imię: <input name="imie" value="<?php echo ($imie); ?>"><br>
        Wiek: <input name="wiek" value="<?php echo ($wiek); ?>"><br>
        Kwota oszczędności: <input name="kwota" value="<?php echo ($kwota); ?>"><br>
        sposob inwestycji:<br>
        <select name="va">
            <option value="nieruchomości">nieruchomości</option>
            <option value="akcje">akcje</option>
            <option value="złoto">złoto</option>
            <option value="obligacje">obligacje</option>
        </select>
        <br>
        <button onclick="submit();">Prześlij</button>
        <br>
        <br>
    </form>
    <?php
    $va;
    if ($_SERVER["REQUEST_METHOD"] == "POST") { // czy dane są przesłane
        echo ("Imię: " . $_POST["imie"] . "<br>");
        echo ("Wiek: " . $_POST["wiek"] . "<br>");
        echo ("Kwota oszczędności: " . $_POST["kwota"] . "<br>");
        echo ("Sposob inwestycji: " . "<br>");
        if (isset($_POST['va'])) {
            $va = $_POST['va'];
            switch ($va) {
                case 'nieruchomości':
                    echo 'nieruchomości';
                    break;
                case 'akcje':
                    echo 'akcje';
                    break;
                case 'złoto':
                    echo 'złoto';
                    break;
                case 'obligacje':
                    echo 'obligacje';
                    break;
                default:
                    echo 'nie wayr<br/>';
                    break;
            }
        }

        $plik = fopen("wyniki.txt", "a");
        fputs($plik, $_POST["imie"] . " | " . $_POST["wiek"] ." | " . $_POST["kwota"] . " | " .  $va ." | ". date("Y-m-d H:i:s") . " | " . $_SERVER["REMOTE_ADDR"] ."\r\n");
        fclose($plik);
    }


    ?>
</body>

</html>