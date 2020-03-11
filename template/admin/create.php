<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable = no">

    <title>things.care - create</title>

    <link rel="stylesheet" href="/template/assets/css/main.css">
    <link rel="stylesheet" href="/template/assets/css/admin.css">
</head>
<body>

    <main class="wrapper">

        <div class="content">

            <h3>admin: create</h3>
            <form method="post">

                <input type="hidden" name="create">
                
                <div class="form-group">
                    <label>title</label>
                    <input name="title" type="text">
                </div>
                
                <div class="form-group">
                    <label>path (w/o leading slash)</label>
                    
                    <?php $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2); ?>
                    <input name="path" type="text" value="<?php echo ltrim($uri_parts[0], '/'); ?>">
                </div>

                <div class="form-group">
                    <button type="submit">Save</button>
                </div>
            
            </form>

        </div>

    </main>
    
</body>
</html>