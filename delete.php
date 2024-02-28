<?php
    //Fetching the ID of the applicant that's to be deleted.
    if (isset ($_GET["id"])) {
        $id = $_GET["id"];

        //Connecting to the SQL Database.
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "practice";
        $connection = new mysqli($servername, $username, $password, $database);

        $sql = "DELETE FROM applicants WHERE id = $id";
        $connection->query($sql);
    }

    //If there's no ID to fetch, then there's no way to determine which applicant should be removed from the list.
    //Whether an applicant is removed or not, the user is then forwarded back to the list page.
    header("location: /practice/list.php");
    exit;
?>