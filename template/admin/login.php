<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable = no">

    <title>things.care - login</title>

    <link rel="stylesheet" href="/template/assets/css/main.css">
    <link rel="stylesheet" href="/template/assets/css/admin.css">
</head>
<body>

    <main class="wrapper">

        <div class="content">

            <h3>admin: login</h3>
            <form method="post">

                <input type="hidden" name="login">
                <input type="hidden" name="path" value="<?php echo strtok($_SERVER['REQUEST_URI'],'?'); ?>">
                
                <div class="form-group">
                    <label>user</label>
                    <input name="user" type="text">
                </div>
                <div class="form-group">
                    <label>password</label>
                    <input name="password" type="password">
                </div>

                <div class="form-group">
                    <button type="submit">Login</button>
                </div>
            
            </form>

        </div>

    </main>
    
</body>
</html>