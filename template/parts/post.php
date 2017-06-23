
		<main id="main">
			<div id="the-post" class="container">
				<article class="post-main">
					<div class="post-entry">
						<div class="heading-section">
							<header class="header big-heading parallax">
								<h1><?php echo $params['title']; ?></h1>
								<div class="meta">
								<time datetime="<?php echo $params['date']; ?>"><?php echo $params['date']; ?></time>
									<em>
                                        <?php

                                        $num_tags = count($params['tags']);
                                        $i = 0;

                                        foreach($params['tags'] as $key => $tag){
                                            echo '<a href="#">'.$tag.'</a>';

                                            if(++$i < $num_tags) {
                                                echo ' — ';
                                            }
                                        }

                                        ?>
									</em>
								</div>
							</header>
						</div>
						<div class="post-body col-md-8 col-md-push-2">
                            <?php echo $content ?>
                        </div>
					</div>
				</article>
			</div>
			
		</main>