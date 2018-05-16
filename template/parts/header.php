<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable = no">
    <meta name="description" content="archive.txt - most minimal cms">

    <title>archive.txt - <?php echo $params['title']; ?></title>

    <link rel="stylesheet" href="/template/assets/css/main.css">
</head>

<body class="<?php if(isset($params['layout'])) { echo $params['layout']; } ?>">

    <div class="wrapper">

    <a class="home" href="/">home</a>
    <h1><?php echo $params['title'] ?></h1>
