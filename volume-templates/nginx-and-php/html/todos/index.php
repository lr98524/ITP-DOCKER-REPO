<?php
include './mysql/index.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do App in PHP</title>
</head>
<style>
      html {
        color-scheme: light dark;
      }
      body {
        width: 35em;
        margin: 0 auto;
        font-family: Tahoma, Verdana, Arial, sans-serif;
      }
    </style>
<body>
<h1>To Do App</h1>
    <h2>To Do List</h2>
    <ul>
        <?php 
    $sql = 'SELECT text FROM todos';
    $stmt = $pdo->query($sql);
    while ($row = $stmt ->fetch()){
        echo '<li>' . $row['text'] .'</li>';
    }
    ?>
    </ul>
</body>
</html>