<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable = no">
    <meta name="description" content="<?php echo $params['description']; ?>">

    <title>things.care - <?php echo $params['title']; ?></title>

    <link rel="stylesheet" href="/template/assets/css/main.css">
</head>

<body class="<?php if(isset($params['layout'])) { echo $params['layout']; } ?>">


    <main class="wrapper">

        <div class="content">

            <header>
                <div>
                    <a class="home" href="/">hi there</a>
                    &mdash; <a class="home" href="/about">about</a>
                    &mdash; <a class="home" href="/portfolio">portfolio</a>
                </div>
            </header>