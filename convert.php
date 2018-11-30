<head>
    <title>Operation page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="style.css" rel="stylesheet">


</head>

<?php

require_once  'Gift.class.php';

$gift = new Gift('bonus');
$gift->name = 'Money to bonus converted';
$gift->value = 1000;
$gift->image = '/img/money-bonus.jpg';
echo $gift->draw();
