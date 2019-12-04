<?php

    require __DIR__ . '/../../vendor/autoload.php';
    $Parsedown = new Parsedown();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable = no">
    <meta name="description" content="archive.txt - most minimal cms">

    <title>thgie.ch - <?php echo $params['title']; ?></title>

    <link rel="stylesheet" href="https://use.typekit.net/lap0rgi.css">
    <link rel="stylesheet" href="/template/assets/css/main.css">
</head>

<body class="<?php if(isset($params['layout'])) { echo $params['layout']; } ?>">

    <a href="javascrip:;" class="light">☀</a>

    <div class="wrapper">

        <nav>
            <a class="home" href="/">hi there</a>
            → <a class="home" href="/about">about</a>
            → <a class="home" href="/portfolio">portfolio</a>
        </nav>

        <div class="content">