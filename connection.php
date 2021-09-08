<?php
function dbconnect() {

    /* Abroad */
    $username = "root";
    $password = "";
    $hostname = "localhost";
    $dbname = "quizdb";
    //connection to the database
    $dbcon = @mysqli_connect($hostname, $username, $password, $dbname);
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL. "; // mysqli_connect_error()
        exit;
    }
    mysqli_set_charset($dbcon, 'utf8');

    return $dbcon;
}
?>