<?php

    session_set_cookie_params(24*60*60);
    ini_set('session.gc_maxlifetime', '86400');
    session_start();

    require __DIR__ . '/vendor/autoload.php';

    use Symfony\Component\Yaml\Parser;

    $Parsedown = new Parsedown();

    // editing part
    if(isset($_SESSION['logged_in'])){
        if(isset($_POST['edit'])){
            if(isset($_POST['file']) && isset($_POST['content'])){
                file_put_contents($_POST['file'], $_POST['content']);
            }
        }
        if(isset($_POST['create']) || isset($_POST['move'])){
            if(isset($_POST['path']) && isset($_POST['title'])){
                $create_path = './content/'.$_POST['path'].'/'.slugify($_POST['title']).'.md';
                if (!is_dir('./content/'.$_POST['path'])) {
                    mkdir('./content/'.$_POST['path'], 0777, true);
                }
                if(isset($_POST['content'])){
                    file_put_contents($create_path, $_POST['content']);
                } else {
                    file_put_contents($create_path, 'title: '.$_POST['title'].PHP_EOL.'---'.PHP_EOL.'# '.$_POST['title']);
                }
            }
            
            if(isset($_POST['move'])){
                unlink($_POST['oldpath']);
            }
            
            header("Location: /" . $_POST['path'].'/'.slugify($_POST['title']));
            die;
        }
    }

    // reading part
    $conf = get_params(file_get_contents('./conf/conf.conf'));
    $file;
    $assets_path;
    $params = [];
    $content;

    if(file_exists('./content'.strtok($_SERVER["REQUEST_URI"],'?').'.md')){
        $file = './content'.strtok($_SERVER["REQUEST_URI"],'?').'.md';
        $assets_path = '/content'.$_SERVER["REQUEST_URI"].DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;
    } else {
        $file = './content'.strtok($_SERVER["REQUEST_URI"],'?').'/index.md';
        $assets_path = '/content'.$_SERVER["REQUEST_URI"].DIRECTORY_SEPARATOR;
    }
    
    $raw_content = file_get_contents($file);
    $page = explode('---', $raw_content, 2);

    if(count($page) > 1){
        $params = get_params($page[0]);
        $content = $page[1];
    } else {
        $content = $page[0];
    }

    $content = $Parsedown->text($content);

    // admin part
    // login
    if(isset($_GET['login'])) {
        require_once 'template/admin/login.php';
        if(isset($_POST['password'])){
            if($_POST['user'] == $conf['user'] && md5($_POST['password']) == $conf['pwd']){
                $_SESSION['logged_in'] = true;
                header("Location: " . $_POST['path']);
            }
        }

        die;
    }
    // logout is nice
    if(isset($_GET['logout'])) {
        session_destroy();
        header("Location: /");
    }
    // CRUD w/o the D
    if(isset($_SESSION['logged_in']) && isset($_GET['action'])){
        if($_GET['action'] == 'edit') {
            require_once 'template/admin/edit.php';
        } else if($_GET['action'] == 'create') {
            require_once 'template/admin/create.php';
        } else if($_GET['action'] == 'move') {
            require_once 'template/admin/move.php';
        }
    } else {
        // if no admin function found, just show content
        if(isset($conf['login']) || isset($params['login'])){
            if(isset($_SESSION['logged_in']) || $params['login'] == 'false'){
                require_once 'template/index.php';
            } else {
                echo '<h1><a href="?login">nothing to see here</a></h1>';
            }
        } else {
            require_once 'template/index.php';
        }
        
    }

    // some basic functions
    // extract params from file
    function get_params($raw_params){
        $yaml = new Parser();
        $params = $yaml->parse($raw_params);
        if(!isset($params['title'])){
            $params['title'] = '';
        }
        if(!isset($params['description'])){
            $params['description'] = '';
        }
        return $params;
    }

    // slugify some strings
    function slugify($text) {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);

        if (empty($text)) {
        return 'n-a';
        }

        return $text;
    }