<?php foreach($items as $item) { ?>
    <p>
        <b><?php echo esc($item['title']) ?></b>
    </p>
    <img src="<?php echo ipFileUrl(ipReflection($item['image'], array('type' => 'fit', 'width' => 200, 'height' => 200))) ?>" />

<?php } ?>
