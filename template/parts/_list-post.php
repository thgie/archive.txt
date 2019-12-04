<div class="entries">
<?php

    require __DIR__ . '/../../vendor/autoload.php';

    $Parsedown = new Parsedown();

    
    $files = scandir($dir);
    $entries = [];

    foreach($files as $key => $value){
        $path = $dir.DIRECTORY_SEPARATOR.$value;
        if(pathinfo($path, PATHINFO_EXTENSION) == 'txt'){
            $page_params = get_params($path);

            $entry = [
                'path' => $path,
                'title' => $page_params['title'],
                'tags' => $page_params['tags']
            ];

            $date = $page_params['date'];
            if(count(explode('-', $date)) > 1){
                $date = explode('-', $date);
                $entry['end_date'] = strtotime($date[1]);
                $entries[strtotime($date[0])] = $entry;
            } else {
                $entries[strtotime($date)] = $entry;
            }
        }
    }

    krsort($entries);

    foreach($entries as $key => $value){
        echo '<div class="entry">';
            echo '<a href="'.str_replace('.txt', '', str_replace('./content', '', $value['path'])).'">';
            echo $Parsedown->text($value['title']);
            echo '</a>';
            
            echo '<div class="meta">';
                echo date('d. M Y', $key);
                if(isset($value['end_date'])){
                    echo ' - ' . date('d. M Y', $value['end_date']);
                }
                
                if(isset($value['tags'])){
                    echo ' &mdash; '.str_replace(',', ', ', $value['tags']);
                }
            echo '</div>';
        echo '</div>';
    }

?>
</div>