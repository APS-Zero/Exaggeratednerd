<?php

$DB_HOST = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "b48786ad5e511050b722f1deb9720bd6963ce373a3840016";

function sql_connect($dbname) {
  if ($dbname) return mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $dbname);
  else return mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD);
}

function sql_create_db($dbname) {
  $sql_query = "CREATE TABLE IF NOT EXISTS " . $dbname;
  $conn = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD);
  mysqli_query($conn, $sql_query);
}

function sql_create_table($connection, $dbname, $tablename, $elements) {
  $sql_query = "CREATE TABLE IF NOT EXISTS " . $tablename . "(" . $elements . ")";
  $cif = false;
  if (!$connection) {
    $cif = true;
    $connection = sql_connect($dbname);
  }
  mysqli_query($connection, $sql_query);
  if ($cif) mysqli_close($connection);
}

function sql_make_query($connection, $query, $dbname) {
  $cif = false;
  if (!$connection) {
    $cif = true;
    $connection = sql_connect($dbname);
  }
  $result = mysqli_query($connection, $sql_query);
  if ($cif) mysqli_close($connection);
  return $result;
}

function sql_select($connection, $table, $where, $dbname) {
  $sql_query = "SELECT * FROM " . $table;
  if ($where) $sql_query = $sql_query . " WHERE " . $where;
  $cif = false;
  if (!$connection) {
    $cif = true;
    $connection = sql_connect($dbname);
  }
  $result = mysqli_query($connection, $sql_query);
  if ($cif) mysqli_close($connection);
  return $result;
}

function sql_insert($connection, $table, $values, $dbname) {
  $sql_query = "INSERT INTO " . $table . " (";
  $start = true;
  foreach ($values as $name) {
    if ($start) {
      $sql_query = $sql_query . ;
      $start = false;
    }
    $sql_query = $sql_query . ",";
  }
  $sql_query = $sql_query . ")";
  $cif = false;
  if (!$connection) {
    $cif = true;
    $connection = sql_connect($dbname);
  }
  $result = mysqli_query($connection, $sql_query);
  if ($cif) mysqli_close($connection);
  return $result;
}

function sql_update($connection, $table, $id, $values, $dbname) {
  $sql_query = "UPDATE " . $table . " SET ";
  $start = true;
  $_values = "(";
  foreach ($values as $name) {
    if ($start) {
      $sql_query = $sql_query . $name;
      $_values = $_values . $values[$name];
      $start = false;
      continue;
    }
    $sql_query = $sql_query . "," . $name;
    $_values = $_values . "," . $values[$name];
  }
  $sql_query = $sql_query . ")" . $_values . ")";
  $cif = false;
  if (!$connection) {
    $cif = true;
    $connection = sql_connect($dbname);
  }
  $result = mysqli_query($connection, $sql_query);
  if ($cif) mysqli_close($connection);
  return $result;
}

?>
