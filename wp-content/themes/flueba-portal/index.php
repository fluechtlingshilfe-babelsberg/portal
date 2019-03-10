<?php get_header() ?>

<div class="container">
	<h1 class="title"><span style="color: #095e66">Potsdam</span> <span style="color: #0e8a97">Tandems</span></h1>
	<?php while (have_posts()) { the_post(); ?>
		<h2><?php the_title() ?></h2>
		<div class="post-meta-large clearfix">
			<?php the_meta_icons() ?>
		</div>
		<?php the_content() ?>

		<?php if (get_field('attachment')) { ?>
		<strong>Anhang:</strong> <a target="_blank" href="<?= get_field('attachment')['url'] ?>"><?= get_field('attachment')['title'] ?> (<?= get_field('attachment')['filename'] ?>)</a>
		<?php } ?>

	<?php } ?>
</div>

<?php get_footer() ?>
