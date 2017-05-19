<?php $images = array_diff(scandir('./content/'.$params['gallery']), array('.', '..')); ?>

<div class="gallery">
    <?php foreach($images as $image): ?>
    <div class="gallery-item">
        <img src="<?php echo '/content/'.$params['gallery'].'/'.$image; ?>" alt="">
    </div>
    <?php endforeach; ?>
</div>