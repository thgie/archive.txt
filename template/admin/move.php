<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable = no">

    <title>things.care - move</title>

    <link rel="stylesheet" href="/template/assets/css/main.css">
    <link rel="stylesheet" href="/template/assets/css/admin.css">
</head>
<body>

    <main class="wrapper">

        <div class="content">

            <h3>admin: move</h3>
            <form method="post">

                <input type="hidden" name="move">
                <input type="hidden" name="content" value="<?php echo $raw_content; ?>">
                <input type="hidden" name="oldpath" value="<?php echo $file; ?>">
                
                <div class="form-group">
                    <label>old path</label>
                    <input name="old_file" type="text" value="<?php echo $file; ?>" disabled>
                </div>
                
                <div class="form-group">
                    <label>new title</label>
                    <input name="title" type="text" value="<?php echo $params['title']; ?>">
                </div>
                
                <div class="form-group">
                    <label>new path (w/o leading slash)</label>
                    <input name="path" type="text">
                </div>

                <div class="form-group">
                    <button type="submit">Save</button>
                </div>
            
            </form>

        </div>

    </main>
    
</body>
</html>