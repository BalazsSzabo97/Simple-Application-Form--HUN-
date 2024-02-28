<?php
    //Connecting to the SQL Database.
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "practice";
    $connection = new mysqli($servername, $username, $password, $database);

    if($connection -> connect_error) { die("Konnekciós hiba:" . $connection->connect_error); }

    //The code fetches all of the applicants without any filters.
    $sql = "SELECT * FROM applicants";
    $result = $connection -> query($sql);

    if (!$result) { die("Hibás query: " . $connection -> error); } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Jelentkezők</title>
</head>
<body>
    <div class="listContainer">
        <h1>Jelentkezők</h1>
        <table class="table">
            <tr>
                <th>E-Mail cím</th>
                <th>Név</th>
                <th>Kor</th>
                <th>Lakás</th>
                <th>Oktatás</th>
                <th>Román</th>
                <th>Angol</th>
                <th>Analitika</th>
                <th>Excel</th>
                <th>Programozás</th>
                <th>Proaktivítás</th>
                <th>Problémamegoldás</th>
                <th>Csapatmunka</th>
                <th>Tel. Szám</th>
                <th>Visszajelezve</th>
                <th>Info</th>
            </tr>
            <?php 
                while($row = $result -> fetch_assoc()) {
                    if($row['contacted']) { $contacted = "&#x2713;"; }
                    else { $contacted = ""; } 
                    echo "
                        <tr>
                            <td>$row[email]</td>
                            <td>$row[name]</td>
                            <td>$row[age]</td>
                            <td>$row[location]</td>
                            <td>$row[education]</td>
                            <td>$row[skill1]</td>
                            <td>$row[skill2]</td>
                            <td>$row[skill3]</td>
                            <td>$row[skill4]</td>
                            <td>$row[skill5]</td>
                            <td>$row[skill6]</td>
                            <td>$row[skill7]</td>
                            <td>$row[skill8]</td>
                            <td>$row[phone]</td>
                            <td>$contacted</td>
                            <td><a href='info.php?id=$row[id]'>Info</a></td>
                        </tr>
                    ";
                }
            ?>
        </table>
    </div>
</body>
</html>