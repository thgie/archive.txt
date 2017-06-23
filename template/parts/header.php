<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable = no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="description" content="Everything is alive and other tales from the thresholds">

    <!-- Open Graph | Facebook & Google Plus -->
    <meta property="og:title" content="animistology - <?php echo $params['title']; ?>">
    <meta property="og:url" content="https://animistology.net">
    <meta property="og:description" content="Everything is alive and other tales from the thresholds">
    <meta property="og:image" content="https://image-tf.s3.envato.com/files/194471742/screenshots/00-buro-cover-tf.__large_preview.png">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="315">
    <meta property="og:type" content="website">

    <title>animistology - <?php echo $params['title']; ?></title>

    <!-- Favicon -->
    <!--<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/template/assets/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/template/assets/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="/template/assets/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/template/assets/favicon-16x16.png" sizes="16x16" />-->

    <!-- Google Fonts -->
    <link href='//fonts.googleapis.com/css?family=Lora:400,400italic,700%7CWork+Sans:200,400,300,500' rel='stylesheet' type='text/css'>

    <!-- Main styles -->
    <link rel="stylesheet" href="/template/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/template/assets/css/style.css">
    <link rel="stylesheet" href="/template/assets/css/a.css">
</head>

<body class="<?php echo $params['layout'] ?>-page <?php echo $params['layout'] ?>">

<!--<div id="preloader">
    <span class="preloader-ani"></span>
</div>-->

<div id="wrapper">

    <header id="header" class="container-fluid">
        <div class="container">
            <nav class="navbar">
                <div class="navbar-header">
                    <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button"><span></span></button>
                    <div class="logo">
                        <!-- When you will add your own logo, make sure to add your logo´s width and height sizes -->
                        <!-- Adding retina/HDPi support is so easy as adding a double sized image within the srcset attribute with the '2x' descriptor. -->
                        <!-- The src attribute will display the regular size logo -->
                        <a href="/">animistology</a>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <!--<li>
                            <a href="blog.html" data-title="News" data-subtitle="Read our Blog">News</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="single-post.html">Single post</a></li>
                            </ul>
                        </li>-->
                        <li>
                            <a href="/blog" data-title="blog" data-subtitle="Sporadic updates">blog</a>
                        </li>
                        <li>
                            <a href="https://1qm.ch" data-title="1qm" data-subtitle="denken durchs sein, sein durchs machen">1qm</a>
                        </li>
                        <li>
                            <a href="https://ckster.org" data-title="ckster" data-subtitle="celebrating contemporary hacking">ckster</a>
                        </li>
                        <li>
                            <a href="https://rast.be" data-title="Rast" data-subtitle="Demokratie durch Austausch und Begegnung">Rast</a>
                        </li>
                        <li>
                            <a href="https://thgie.ch" data-title="about" data-subtitle="yeah, wtf?">about</a>
                        </li>
                    </ul>
                </div>
            </nav> <!-- ./Main navigation -->
        </div>
    </header>
    <div class="main-container">