<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/index.css" rel="stylesheet" type="text/css"/>
    <title>Calculadora</title>
</head>
<body>
</body>
</html>
<?php
    session_start();
    include './html.php';
    include './processa_dados.php';

    new Html();
        
    if(!empty($_POST)){
        new processaDados();
    }

