<?php

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css');
});

function the_meta_icons() { ?>
    <div class="post-meta-item"><span class="mdi mdi-map-marker"></span> <?php the_field('location') ?></div>
    <div class="post-meta-item"><span class="mdi mdi-calendar-clock"></span> <?php the_field('time') ?></div>
    <?php if (get_field('german_required')) {?>
	    <div class="post-meta-item"><span class="mdi mdi-translate"></span> Deutschkenntnisse erforderlich</div>
    <?php } ?>
    <?php if (get_field('only_women')) {?>
	    <div class="post-meta-item"><span class="mdi mdi-human-female"></span> Für Frauen</div>
    <?php } ?>
<?php }
