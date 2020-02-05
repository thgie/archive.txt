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
                    'tags' => $page_params['tags'],
                    'content' => $Parsedown->text($page[1])
                ];

                if(isset($page_params['until'])){
                    $entry['until'] = strtotime($page_params['until']);
                }

                $date = $page_params['date'];
                $entries[strtotime($date)] = $entry;
            }
        }

        krsort($entries);

        foreach($entries as $key => $value){

            $dom = new DOMDocument();
            $dom->loadHTML(mb_convert_encoding($value['content'], 'HTML-ENTITIES', 'UTF-8'));
        
            $imgs = $dom->getElementsByTagName('img');

            echo '<div class="entry">';

                echo '<a href="'.str_replace('.md', '', str_replace('./content', '', $value['path'])).'">';
                echo $Parsedown->text($value['title']);
                echo '</a>';

                if(count($imgs) > 0){
                    if(!is_null($imgs[0])){
                        $imgs[0]->setAttribute('src', str_replace('.md', '', $value['path']).'/../'.$imgs[0]->getAttribute('src'));
                        echo '<div class="image">';
                        echo $imgs[0]->C14N();
                        echo '</div>';
                    }
                }
                
                echo '<div class="meta">';
                    echo date('d. M Y', $key);
                    if(isset($value['until'])){
                        echo ' - ' . date('d. M Y', $value['until']);
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
