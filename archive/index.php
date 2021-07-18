<?php

if(isset($_GET['image'])) {
    return_image(realpath('.' . $_SERVER["REQUEST_URI"]));
}

require __DIR__ . '/../vendor/autoload.php';

$map = [];
$Parsedown = new Parsedown();

$map = mapping('.');
$route = strtok($_SERVER["REQUEST_URI"], '?');

if($route == '/') {
    $route = '/index';
}

$title = isset($map[$route]['params']['title'])
    ? $map[$route]['params']['title'] : $map[$route]['title'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - archive.txt</title>

    <base href="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>" target="_blank">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;0,400;0,700;1,100;1,400;1,700&display=swap" rel="stylesheet">
    
    <style>
        html, body {
            font-family: 'Roboto Mono', monospace;
        }
    </style>

</head>
<body>

    <?php if(isset($map[$route]['params']['template'])): ?>
    <?php else: ?>
        <?= render($map[$route]['content']) ?>
    <?php endif; ?>

</body>
</html>

<?php

function mapping($dir, &$results = array()) {
    $files = scandir($dir);

    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            $info = pathinfo($path);
            if(isset($info['extension'])){
                if($info['extension'] == 'md' || $info['extension'] == 'txt') {
                    $dirs = explode('/', str_replace(getcwd(), '', $info['dirname']));
                    $dirname = '';
                    if(count($dirs) > 1){
                        $dirname = '/';
                        foreach($dirs as $key => $dir){
                            if($dir != ''){
                                $dirname .= slugify($dir);
                            }
                        }
                    } else {
                        $dirname = str_replace(getcwd(), '', $info['dirname']);
                    }
                    
                    $slug = $dirname.'/'.slugify($info['filename']);
                    $content = parse($path);
                    $results[$slug] = [
                        'title' => $info['filename'],
                        'path' => $path,
                        'slug' => $slug,
                        'params' => $content[0],
                        'content' => $content[1]
                    ];
                }
            }
        } else if ($value != "." && $value != ".." && $value != "_deprecated") {
            mapping($path, $results);
        }
    }

    return $results;
}

function parse($path) {
    $params = [];
    $file_content = file_get_contents($path);
    if (strpos($file_content, '---') !== false) {

        $head = explode('---', $file_content)[0];
        $content = explode('---', $file_content)[1];

        foreach(preg_split("/((\r?\n)|(\r\n?))/", $head) as $line){
            if($line != ''){
                $param = explode(':', $line, 2);
                /*
                    TODO: A bit hacky, basically checking if there is a param
                    and if not, aborting to default.
                */
                if(isset($param[1])){
                    $params[$param[0]] = $param[1];
                } else {
                    return [
                        [],
                        $file_content
                    ];
                }
            }
        } 

        return [
            $params,
            $content
        ];
    } else  {
        return [
            $params,
            $file_content
        ];
    }
}

function render($content){
    global $Parsedown;
    global $map;
    global $route;

    $content = render_wiki_links($content);
    $content = $Parsedown->text($content);
    return $content;
}

function render_wiki_links($content){

    preg_match_all('/\[\[(.+?)\]\]/u', $content, $matches);
    
    foreach($matches[1] as $i => $match) {
        $slug = get_slug_from_title($match);
        if($slug) {
            $a = '<a href="'.$slug.'" target="_self">'.$match.'</a>';
            $content = str_replace($matches[0][$i], $a, $content);
        }
    }

    return $content;
}

function get_slug_from_title($title){
    global $map;

    foreach($map as $slug => $item){
        if($item['title'] == $title){
            return $slug;
        }
    }

    return false;
}

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

function return_image($path){
    if(substr($path, -3) === 'jpg'){
        $img = imagecreatefromjpeg($path);
    }
    if(substr($path, -3) === 'png'){
        $img = imagecreatefrompng($path);
    }

    if(imagesx($img) >= 1000){
        $img = imagescale($img, 1000);
    }

    Header("Content-type: image/jpg");
    imagejpeg($img, NULL, 90);
    imagedestroy($img);

    die();
}

?>