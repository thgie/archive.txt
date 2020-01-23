<div id="portfolio">

    <?php echo $content; ?>

    <div class="entries">
    <?php

        require __DIR__ . '/../../vendor/autoload.php';

        $Parsedown = new Parsedown();
        
        $dir = './content/'.$params['folder'];
        $files = scandir($dir);
        $entries = [];

        foreach($files as $key => $value){
            $path = $dir.DIRECTORY_SEPARATOR.$value;
            if(pathinfo($path, PATHINFO_EXTENSION) == 'md'){
                $page_params = [];

                $page = explode('---', file_get_contents($path));
                if(count($page) > 1){
                    $page_params = get_params($page[0]);
                }

                $entry = [
                    'path' => $path,
                    'title' => $page_params['title'],
                    'tags' => $page_params['tags']
                ];

                $date = $page_params['date'];
                $entries[strtotime($date)] = $entry;
            }
        }

        krsort($entries);

        foreach($entries as $key => $value){
            echo '<div class="entry">';
                echo '<a href="'.str_replace('.md', '', str_replace('./content', '', $value['path'])).'">';
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

</div>
