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
                    <?php
                        echo $Parsedown->text(file_get_contents('./conf/nav.md'));
                    ?>
                </div>
                <div class="wiki-actions">
                    <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                        <a href="?action=create" class="tdn create">➕</a>
                        <a href="?action=edit" class="tdn edit">✏️</a>
                        <a href="?action=move" class="tdn move">🗃️</a>
                        <a href="javascript:;" class="tdn filemanager-btn">🖼️</a>

                        <script>
                            
                            document.addEventListener('keyup', (e) => {
                                if (e.code === 'KeyE') {
                                    document.querySelector('.edit').click();
                                }
                                if (e.code === 'KeyC') {
                                    document.querySelector('.create').click();
                                }
                                if (e.code === 'KeyM') {
                                    document.querySelector('.move').click();
                                }
                                if (e.code === 'KeyF') {
                                    document.querySelector('.filemanager-btn').click();
                                }
                            });

                            document.querySelector('.filemanager-btn').addEventListener('click', function(){
                                document.querySelector('.filemanager').classList.toggle('open');
                            })
                        
                        </script>

                    <?php endif; ?>
                </div>
            </header>