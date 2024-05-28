<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styl1.css">
    <script>
        function Wiek() {
            var wiek = document.getElementById("wiek").value;
            wiek = parseInt(wiek);
    
            if ((wiek>27)) {
                alert("Jestes straszy od Toma Hollanda");
            } else if(wiek==27) {
                alert("Jestes w wieku Toma Hollanda");
            }
            else{
                alert("Jestes mlodszy od Toma Hollanda")
            }
        }
    </script>
   
</head>
<body>
    <header><h1>Stacja filmowa</h1><img src="wb1.png" width="200px" height="200px">

</hedear>
    <section id="lewy">
    <form method="POST">
    tytul &nbsp<input type="text" name="tytul"><br><br>
    wydawnictwo &nbsp<input type="text" name="wydawnictwo"><br><br>
    nazwisko rezysera &nbsp<input type="text" name="rezyser"><br><br>
    nazwisko aktora &nbsp<input type="text" name="aktor"><br><br>
    typ filmu &nbsp<input type="text" name="typ"><br><br>
    <button type="submit">wyslij do bazy</button><br><br>


</form>

<?php
if(isset($_POST["tytul"])){
$tytul = $_POST["tytul"];
$wydawnictwo = $_POST["wydawnictwo"];
$rezyser = $_POST["rezyser"];
$aktor = $_POST["aktor"];
$typ=$_POST["typ"];
$con = mysqli_connect("localhost", "root", "", "filmoteka");

if (!$con) {
    die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
}



$sql = "INSERT INTO film (tytul, wydawnictwo, nazwisko_rezysera, nazwisko_aktora,typ) VALUES ('$tytul', '$wydawnictwo', '$rezyser', '$aktor','$typ')";

if (mysqli_query($con, $sql)) {
    echo "Dane zostały dodane do bazy danych.";
} else {
    echo "Błąd podczas dodawania danych: " . mysqli_error($con);
}

mysqli_close($con);
}
?>
     <form method="post">
        <br><br>Ile masz lat: <input type="number" name="wiek" id="wiek" />
        <button type="button" onclick="Wiek()">Kliknij!</button>
    </form>
   
</section>
<section id="prawy">
<table >
        <tr>
            <th>ID</th>
            <th>tytul</th>
            <th>wydawnictwo</th>
            <th>Nazwisko rezysera</th>
            <th>Nazwisko aktora</th>
            <th>typ filmu</th>
        </tr>

        <?php
        $con = mysqli_connect("localhost", "root", "", "filmoteka");

        if (!$con) {
            die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM film";
        $result = mysqli_query($con, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['tytul'] . "</td>";
                echo "<td>" . $row['wydawnictwo'] . "</td>";
                echo "<td>" . $row['nazwisko_rezysera'] . "</td>";
                echo "<td>" . $row['nazwisko_aktora'] . "</td>";
                echo "<td>" . $row['typ'] . "</td>";
                echo "</tr>";
            }
            mysqli_free_result($result);
        } else {
            echo "Błąd podczas pobierania danych: " . mysqli_error($con);
        }

        mysqli_close($con);
        ?>
        <?php
if(isset($_POST["tytul"])){
$tytul = $_POST["tytul"];
$wydawnictwo = $_POST["wydawnictwo"];
$rezyser = $_POST["rezyser"];
$aktor = $_POST["aktor"];
$typ=$_POST["typ"];



$data = "tytul: " . $tytul . "\n";
$data .= "wydawnictwo: " . $wydawnictwo . "\n";
$data .= "nazwisko rezysera: " . $rezyser . "\n\n";
$data .= "nazwisko aktora: " . $aktor . "\n\n";
$data .= "typ: " . $typ . "\n\n";


$filePath = "plik5.txt";


$file = fopen($filePath, "a");

if ($file) {
    
    fwrite($file, $data);
    fclose($file);

    echo "<br> Dane zostały zapisane do pliku 'plik.txt'.";
} else {
    echo "Błąd podczas zapisywania danych do pliku.";
}
}
?>
    </table>

    </section>
    <footer>0000000000000</footer>


    
</body>
</html>

