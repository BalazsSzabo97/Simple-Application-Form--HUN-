<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "practice";
    $connection = new mysqli($servername, $username, $password, $database);

    $email = null;
    $name = null;
    $age = null;
    $location = null;
    $education = null;
    $skill1 = null;
    $skill2 = null;
    $skill3 = null;
    $skill4 = null;
    $skill5 = null;
    $skill6 = null;
    $skill7 = null;
    $skill8 = null;
    $analyticsExperience = null;
    $tagExperience = null;
    $strengths = null;
    $oneToThree = null;
    $marketingExperience = null;
    $cvURL = null;
    $phone = null;
    $message = null;

    if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST["email"];
        $name = $_POST["name"];
        $age = $_POST["age"];
        $location = $_POST["location"];
        $education = $_POST["education"];
        $skill1 = $_POST["skill1"];
        $skill2 = $_POST["skill2"];
        $skill3 = $_POST["skill3"];
        $skill4 = $_POST["skill4"];
        $skill5 = $_POST["skill5"];
        $skill6 = $_POST["skill6"];
        $skill7 = $_POST["skill7"];
        $skill8 = $_POST["skill8"];
        $analyticsExperience = $_POST["analyticsExperience"];
        $tagExperience = $_POST["tagExperience"];
        $strengths = $_POST["strengths"];
        $oneToThree = $_POST["oneToThree"];
        $marketingExperience = $_POST["marketingExperience"];
        $cvURL = $_POST["cvURL"];
        $phone = $_POST["phone"];
        $message = $_POST["message"];
        $contacted = false;     //A newly created applicant wouldn't have been contacted yet.

        $sql = "INSERT INTO `applicants`(`email`, `name`, `age`, `location`, `education`, `skill1`, `skill2`, `skill3`, `skill4`, `skill5`,
        `skill6`, `skill7`, `skill8`, `analyticsExperience`, `tagExperience`, `strengths`, `oneToThree`, `marketingExperience`,
        `cvURL`, `phone`, `message`, `contacted`) 
        VALUES ('$email', '$name', '$age', '$location', '$education', '$skill1', '$skill2', '$skill3', '$skill4', '$skill5', '$skill6', '$skill7',
        '$skill8', '$analyticsExperience', '$tagExperience', '$strengths', '$oneToThree', '$marketingExperience', '$cvURL', '$phone',
        '$message', '$contacted')";

        $result = $connection->query($sql);
        if ($result) { $errorMessage = "Hiba: " . $connection -> error;}
        echo '<script>
            alert("Köszönjük a jelentkezését!");
        </script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Form Practice</title>
</head>
<body>
    <div class="container">
        <h1>Jelentkezés</h1>
        <hr>
        <form method="post">
        <div class="inputContainer">
            <input type="text" name="email" placeholder="E-mail Cím" value="<?php echo $email ?>" required>
        </div>  
        <div class="inputContainer">
            <input type="text" name="name" placeholder="Név" value="<?php echo $name ?>" required>
        </div>
        <div class="inputContainer">
            <input type="number" name="age" placeholder="Korod" value="<?php echo $age ?>" required>
        </div>
        <div class="inputContainer">
            <input type="text" name="location" placeholder="Hol laksz jelenleg?" value="<?php echo $location ?>" required>
        </div>
        <div class="inputContainer">
            <input type="text" name="education" placeholder="Mi a legmagasabb végzettséged?" value="<?php echo $education ?>" required>
        </div>
        <div class ="inputContainer">
            <h4>Nyelvtudás, képességek, készségek (1 - Nem erősségem, 5 - Kiváló vagyok) </h4>
            <div class="tablebox">
                <label>Román nyelvtudás</label>
                <div class="radiobox">
                    <input type="radio" id="1" name="skill1" value="1" required>
                    <input type="radio" id="2" name="skill1" value="2">
                    <input type="radio" id="3" name="skill1" value="3">
                    <input type="radio" id="4" name="skill1" value="4">
                    <input type="radio" id="5" name="skill1" value="5">
                </div>
            </div>
            <div class="tablebox">
                <label>Angol nyelvtudás</label>
                <div class="radiobox">
                    <input type="radio" id="1" name="skill2" value="1" required>
                    <input type="radio" id="2" name="skill2" value="2">
                    <input type="radio" id="3" name="skill2" value="3">
                    <input type="radio" id="4" name="skill2" value="4">
                    <input type="radio" id="5" name="skill2" value="5">
                </div>  
            </div>
            <div class="tablebox">
                <label>Analitikai és elemző szoftverek ismerete</label>
                <div class="radiobox">
                    <input type="radio" id="1" name="skill3" value="1" required>
                    <input type="radio" id="2" name="skill3" value="2">
                    <input type="radio" id="3" name="skill3" value="3">
                    <input type="radio" id="4" name="skill3" value="4">
                    <input type="radio" id="5" name="skill3" value="5">
                </div>
            </div>
            <div class="tablebox">
                <label>Excel használat</label>
                <div class="radiobox">
                    <input type="radio" id="1" name="skill4" value="1" required>
                    <input type="radio" id="2" name="skill4" value="2">
                    <input type="radio" id="3" name="skill4" value="3">
                    <input type="radio" id="4" name="skill4" value="4">
                    <input type="radio" id="5" name="skill4" value="5">
                </div>
            </div>
            <div class="tablebox">
                <label>Programozási tapasztalat</label>
                <div class="radiobox">
                    <input type="radio" id="1" name="skill5" value="1" required>
                    <input type="radio" id="2" name="skill5" value="2">
                    <input type="radio" id="3" name="skill5" value="3">
                    <input type="radio" id="4" name="skill5" value="4">
                    <input type="radio" id="5" name="skill5" value="5">
                </div>
            </div>
            <div class="tablebox">
                <label>Proaktív munkavégzés</label>
                <div class="radiobox">
                    <input type="radio" id="1" name="skill6" value="1" required>
                    <input type="radio" id="2" name="skill6" value="2">
                    <input type="radio" id="3" name="skill6" value="3">
                    <input type="radio" id="4" name="skill6" value="4">
                    <input type="radio" id="5" name="skill6" value="5">
                </div>
            </div>
            <div class="tablebox">
                <label>Problémamegoldás</label>
                <div class="radiobox">
                    <input type="radio" id="1" name="skill7" value="1" required>
                    <input type="radio" id="2" name="skill7" value="2">
                    <input type="radio" id="3" name="skill7" value="3">
                    <input type="radio" id="4" name="skill7" value="4">
                    <input type="radio" id="5" name="skill7" value="5">
                </div>
            </div>
            <div class="tablebox">
                <label>Csapatmunka, csapatszellem</label>
                <div class="radiobox">
                    <input type="radio" id="1" name="skill8" value="1" required>
                    <input type="radio" id="2" name="skill8" value="2">
                    <input type="radio" id="3" name="skill8" value="3">
                    <input type="radio" id="4" name="skill8" value="4">
                    <input type="radio" id="5" name="skill8" value="5">
                </div>
            </div>
        </div>
        <div class="inputContainer">
            <textarea type="text" name="analyticsExperience" rows="5" placeholder="Van már tapasztalatod a Google Ads / Analytics területén?" required><?php echo $analyticsExperience ?></textarea>
        </div>
        <div class="inputContainer">
            <textarea type="text" name="tagExperience" rows="5" placeholder="Mondanak neked valamit a Google Tag Manager, Looker Studio eszközök?" required><?php echo $tagExperience ?></textarea>
        </div>
        <div class="inputContainer">
            <textarea type="text" name="strengths" rows="5" placeholder="Szerinted mi az, amit Te tudsz hozzátenni a csapatunkhoz? Mik az erősségeid?" required><?php echo $strengths ?></textarea>
        </div>
        <div class="inputContainer">
            <textarea type="text" name="oneToThree" rows="5" placeholder="Szerinted mi kell ahhoz, hogy az ember egyről a háromra jusson?" required><?php echo $oneToThree ?></textarea>
        </div>
        <div class="inputContainer">
            <textarea type="text" name="marketingExperience" rows="5" placeholder="Van munkatapasztalatod az online marketing területén? Ha igen, mesélj róla!" required><?php echo $marketingExperience ?></textarea>
        </div>
        <div class="inputContainer">
            <input type="url" name="cvURL" placeholder="Kérlek töltsd fel az önéletrajzod!" value="<?php echo $cvURL ?>" required>
        </div>
        <div class="inputContainer">
            <input type="text" name="phone" placeholder="Szükségünk lenne a telefonszámodra, hogy el tudjunk érni az esetleges kérdéseinkkel." value="<?php echo $phone ?>" required>
        </div>
        <div class="inputContainer">
            <textarea type="text" name="message" placeholder="Ha még szeretnél bármit megosztani velünk, csak nyugodtan. :) (nem kötelező)"><?php echo $message ?></textarea>
        </div>
        <div class="centerContainer">
            <button type="submit" class="button">Beküldés</button>
        </div>
        </form>
    </div>
</body>
</html>