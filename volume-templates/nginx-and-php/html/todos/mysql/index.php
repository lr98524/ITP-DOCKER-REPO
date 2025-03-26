<?php
$dsn = 'mysql:hosts=' . $_ENV['MYSQL_HOST'] . ';port=' . $_ENV['MYSQL_TCP_PORT'] . ';dbname=' . $_ENV['MYSQL_DATABASE'];
$username =$_ENV['MYSQL_USER'];
$password = $_ENV['MYSQL_PASSWORD'];

$options ={
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_TIMEOUT => 3,
};


try{
    $pdo = new PDO($dsn, $username, $password $options);
    if (__FILE__ == $_SERVER['SCRIPT_FILENAME'])  {
        echo "Connected successfully!";
    }
}
 catch (PDOException $e) { 
    echo "Connection failed: " . $e->getMessage();
 }

?>