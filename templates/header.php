<?php

require_once __DIR__.'/../vendor/autoload.php';

use Todolist\DB;

$db = new DB();

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="/public/bulma.min.css">
</head>

<body>

    <section class="section">
        <div class="container">