<?php
    //Connecting to the SQL Database.
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "practice";
    $connection = new mysqli($servername, $username, $password, $database);

    if (!isset($_GET["id"])) {
        header("location: /practice/list.php");     //If the ID is unset, the user is forwarded back to the list page.
        exit;
    }

    $id = $_GET["id"];
    $sql = "SELECT * FROM applicants WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    $email = $row["email"];
    $name = $row["name"];
    $age = $row["age"];
    $location = $row["location"];
    $education = $row["education"];
    $skill1 = $row["skill1"];
    $skill2 = $row["skill2"];
    $skill3 = $row["skill3"];
    $skill4 = $row["skill4"];
    $skill5 = $row["skill5"];
    $skill6 = $row["skill6"];
    $skill7 = $row["skill7"];
    $skill8 = $row["skill8"];
    $analyticsExperience = $row["analyticsExperience"];
    $tagExperience = $row["tagExperience"];
    $strengths = $row["strengths"];
    $oneToThree = $row["oneToThree"];
    $marketingExperience = $row["marketingExperience"];
    $cvURL = $row["cvURL"];
    $phone = $row["phone"];
    $message = $row["message"];
    $contacted = $row["contacted"];

    //Clicking either button.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Setting and unsetting the "Contacted" value.
        if(isset($_POST['contact'])) {
            if ($contacted == 0) {
                $newContacted = 1;
                $alertMessage = "Visszajelzés rögzítve!";
            } else {
                $newContacted = 0;
                $alertMessage = "Visszajelzés visszavonva!";
            }
            $sql = "UPDATE applicants SET contacted = $newContacted WHERE id = $id";
            echo "<script type='text/javascript'>alert('$alertMessage');</script>";
            $result = $connection->query($sql);
            if ($result) { $errorMessage = "Hiba: " . $connection -> error;}
        }
        //Clicking the delete button. This code itself won't remove it from the Database, but forward the userr to the delete.php page.
        if(isset($_POST['delete'])) {
            echo '<script>
                var confirmed = confirm("Törülni kivánja a jelentkezést?");
                if(confirmed) {
                    window.location.href="delete.php?id=' . $id . '"
                }
            </script>';
        }
    }   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Info</title>
</head>
<body>
    <div class="container">
        <a href='list.php'>Vissza</a>
        <h1><?php echo $name ?></h1>
        <form method="post">
        <div>
            <label>E-mail Címe:</label>
            <input type="text" name="email" disabled value="<?php echo $email ?>">
        </div>
        <div>
            <label>Kora:</label>
            <input type="number" name="age" disabled value="<?php echo $age ?>">
        </div>
        <div>
            <label>Szállása:</label>
            <input type="text" name="location" disabled value="<?php echo $location ?>">
        </div>
        <div>
            <label>Legmagasabb végzettsége:</label>
            <input type="text" name="education" disabled value="<?php echo $education ?>">
        </div>
        <div>
            <table class="tableSkill">
                <tr>
                    <th>Nyelvtudás, képességek, készségek</th>
                    <th>Pontozás</th>
                </tr>
                <tr>
                    <td>Román nyelvtudás</td>
                    <td><?php echo $skill1 ?>
                </tr>
                <tr>
                    <td>Angol nyelvtudás</td>
                    <td><?php echo $skill2 ?>
                </tr>
                <tr>
                    <td>Analitikai és elemző szoftverek ismerete</td>
                    <td><?php echo $skill3 ?>
                </tr>
                <tr>
                    <td>Excel használat</td>
                    <td><?php echo $skill4 ?>
                </tr>
                <tr>
                    <td>Programozási tapasztalat</td>
                    <td><?php echo $skill5 ?>
                </tr>
                <tr>
                    <td>Proaktív munkavégzés</td>
                    <td><?php echo $skill6 ?>
                </tr>
                <tr>
                    <td>Problémamegoldás</td>
                    <td><?php echo $skill7 ?>
                </tr>
                <tr>
                    <td>Csapatmunka, csapatszellem</td>
                    <td><?php echo $skill8 ?>
                </tr>
            </table>
        </div>
        <div>
            <label>Google Ads / Analytics tapasztalata:</label>
            <textarea type="text" name="analyticsExperience" disabled><?php echo $analyticsExperience ?></textarea>
        </div>
        <div>
            <label>Google Tag Manager, Looker Studio eszközök tapasztalata:</label>
            <textarea type="text" name="tagExperience" disabled><?php echo $tagExperience ?></textarea>
        </div>
        <div>
            <label>Erősségei:</label>
            <textarea type="text" name="strengths" disabled><?php echo $strengths ?></textarea>
        </div>
        <div>
            <label>Egyről a háromra:</label>
            <textarea type="text" name="oneToThree" disabled><?php echo $oneToThree ?></textarea>
        </div>
        <div>
            <label>Online Marketing Tapasztalata:</label>
            <textarea type="text" name="marketingExperience" disabled><?php echo $marketingExperience ?></textarea>
        </div>
        <div>
            <label>Önéletrajza:</label>
            <input type="url" name="cvURL" disabled value="<?php echo $cvURL ?>">
        </div>
        <div>
            <label>Telefonszáma:</label>
            <input type="text" name="phone" disabled value="<?php echo $phone ?>">
        </div>
        <div>
            <label>Opcionális üzenete:</label>
            <textarea type="text" name="message" disabled><?php echo $message ?></textarea>
        </div>
        <div class="centerContainer">
            <button type="submit" class="button" name="contact">Visszajelzés</button>
            <button type="submit" class="buttonRed" name="delete">Törlés</button>
        </div>
        </form>
    </div>
</body>
</html>