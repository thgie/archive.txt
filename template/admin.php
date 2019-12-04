<?php

    require_once 'parts/header.php';

?>
    
    <form method="post">

        <textarea name="content" id="content"><?php echo $raw_content; ?></textarea>
        <input type="hidden" name="save">
        <input type="submit">
        <a href="<?php echo strtok($_SERVER["REQUEST_URI"],'?'); ?>">cancel</a>

    </form>

    <style>
    
        form {
            margin-top: 20px;
        }
        textarea {
            width: 100%;
            height: 400px;
            margin-bottom: 20px;
            border: none;
            border-bottom: 1px solid #181818;
        }
    
    </style>

<?php 
    
    require_once 'parts/footer.php';

?>