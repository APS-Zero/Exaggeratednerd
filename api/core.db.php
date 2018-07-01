<?php

$DB_HOST = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "fhfdhjsdfosd92nsdonozonvinlnkld";

function sql_connect() {
  return mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD);
}

function sql_connect($dbname) {
  return mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $dbname);
}

function sql_create_db($dbname) {
  $sql_query = "CREATE TABLE IF NOT EXISTS " . $dbname;
  $conn = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD);
  mysqli_query($conn, $sql_query);
}

function sql_create_table($dbname, $tablename, $elements) {
  $sql_query = "CREATE TABLE IF NOT EXISTS " . $tablename . "(" . $elements . ")";
  $conn = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $dbname);
  mysqli_query($conn, $sql_query);
}

?>
