<?php
    if (isset ($_GET["id"])) {
        $id = $_GET["id"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "practice";
        $connection = new mysqli($servername, $username, $password, $database);

        $sql = "DELETE FROM applicants WHERE id = $id";
        $connection->query($sql);
    }

    header("location: /practice/list.php");
    exit;
?>