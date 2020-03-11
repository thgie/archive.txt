<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable = no">
    <meta name="description" content="<?php echo $params['description']; ?>">

    <title>things.care - <?php echo $params['title']; ?></title>

    <link rel="stylesheet" href="/template/assets/css/main.css">
    <link rel="stylesheet" href="/template/assets/css/admin.css">
    <link rel="stylesheet" href="/template/assets/simplemde/simplemde.min.css">

    <style>

        html, body {
            height: 100%;
        }
        .content {
            padding: 0;
        }
        form {
            height: calc(100% - 80px);
        }
        .form-group, .CodeMirror {
            height: 100% !important;
        }
        .editor-toolbar, .CodeMirror {
            border: 0;
        }
        .form-group.actions {
            position: fixed;
            top: 0;
            right: 0;
            padding: 10px;
            height: auto !important;
            z-index: 100;
            margin: 0;
        }

        .CodeMirror .CodeMirror-code .cm-header-1,
        .CodeMirror .CodeMirror-code .cm-header-2 {
            font-family: 'Girott';
            font-weight: normal;
        }

        .CodeMirror .CodeMirror-code .cm-header-1 {
            letter-spacing: -5px;
            font-size: 8vw;
            line-height: 1;
            margin-bottom: 8vw;
        }

        .CodeMirror .CodeMirror-code .cm-header-2 {
            font-size: 6vw;
            margin-top: 5vw;
            margin-bottom: 1vw;
        }

        .CodeMirror .CodeMirror-code .cm-header-3 {
            font-family: 'TimesNow';
            font-size: 3vw;
            margin-top: 3vw;
            margin-bottom: 1vw;
        }

        .CodeMirror-line > span {
            font-family: 'TimesNow';
            font-size: 2.5vw;
            margin-bottom: 2vw;
        }

        .cm-formatting-header {
            color: #aab2b3;
        }

        @media(min-width: 1200px) {
            .CodeMirror .CodeMirror-code .cm-header-1 {
                font-size: 96px;
            }

            .CodeMirror .CodeMirror-code .cm-header-2 {
                font-size: 72px;
            }

            .CodeMirror .CodeMirror-code .cm-header-3 {
                font-size: 36px;
            }

            .CodeMirror-line > span {
                font-size: 30px;
            }
        }

        @media(max-width: 800px) {

            .CodeMirror .CodeMirror-code .cm-header-1 {
                font-size: 65px;
            }

            .CodeMirror .CodeMirror-code .cm-header-2 {
                font-size: 48px;
            }

            .CodeMirror .CodeMirror-code .cm-header-3,
            .CodeMirror-line > span {
                font-size: 20;
            }
        }
    
    </style>

    <script src="/template/assets/simplemde/simplemde.min.js"></script>
</head>
<body>


    <form method="post">

        <input type="hidden" name="edit">
        <input name="file" type="hidden" value="<?php echo $file; ?>">

        <div class="form-group">
            <textarea name="content" id="content"><?php echo $raw_content; ?></textarea>
        </div>

        <div class="form-group actions">
            <button type="submit">💾</button>

            <?php $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2); ?>
            <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . $uri_parts[0]; ?>" class="view">👁️</a>
            <a href="javascript:;" class="tdn filemanager-btn">🖼️</a>
        </div>
        
    </form>

    <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>

        <iframe class="filemanager" src="/template/tinyfilemanager/tinyfilemanager.php" frameborder="0"></iframe>

    <?php endif; ?>


    <script>

        document.querySelector('.filemanager-btn').addEventListener('click', function(){
            document.querySelector('.filemanager').classList.toggle('open');
        })

        var simplemde = new SimpleMDE();
    
    </script>
    
</body>
</html>