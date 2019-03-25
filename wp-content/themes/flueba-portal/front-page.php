<?php get_header() ?>

<?php
// Sort by category, then by title
function sort_posts_by_category( $a, $b ) {
	$c = strcmp(wp_strip_all_tags($a->category->name), wp_strip_all_tags($b->category->name));
	return $c == 0 ?  strcmp($a->post_title, $b->post_title) : $c;
}
foreach ($posts as $post)
	$post->category = get_the_category($post)[0];
usort($posts, 'sort_posts_by_category');

function the_post_shortcut() { ?>
<a class="post-shortcut" href="<?php the_permalink() ?>">
	<?php if (get_field('expiry')) {
		$date = strtotime(get_field('expiry')); ?>
		<div class="post-date">
			<span class="post-date-number"><?= date_i18n("j", $date) ?></span>
			<span class="post-date-word"><?= date_i18n("M", $date) ?></span>
		</div>
	<?php } ?>

	<h4><?php the_title() ?></h4>
	<?php the_excerpt() ?>
	<div class="post-meta clearfix">
		<?php the_meta_icons() ?>
	</div>
</a>
<?php }

function the_post_loop($category_filter, $category_headings = false) {
	$current_category = null;
	while (have_posts()) {
		the_post();
		$category = get_the_category()[0];
		if (!$category_filter($category))
			continue;

		if ($current_category != $category && $category_headings)
			echo '<h2 class="subcategory-header">' . $category->name . '</h2>';
		$current_category = $category;

		the_post_shortcut();
	}
	rewind_posts();
}
?>

<div class="container clearfix">
	<a target="_blank" href="mailto:netzwerk@fluechtlingshilfe-babelsberg.de?cc=bastilaurich@web.de@&subject=Infoboard%20Angebot" class="hint">Tipp an uns</a>

	<h1 class="title"><span style="color: #095e66">Infoboard Potsdam</span> <span style="color: #0e8a97">Tandems</span></h1>

	<div class="headers">
		<a class="category-active" href="#hilfe"><h2>Hilfe im Alltag</h2></a>
		<a href="#freizeit"><h2>Freizeit</h2></a>
	</div>

	<div class="category-container category-active" id="hilfe">
		<?php the_post_loop(function($c) { return strpos($c->name, 'Freizeit') === false; }, true); ?>
	</div>

	<div class="category-container" id="freizeit">
		<?php the_post_loop(function($c) { return strpos($c->name, 'Freizeit') !== false; }); ?>
	</div>
</div>

<script>
function choose_category(category) {
	var valid = ['#hilfe', '#freizeit'];
	if (valid.filter(function(v) { return v == category;}).length < 1)
		category = '#hilfe';
	document.querySelectorAll('.category-active').forEach(function(e) {e.classList.remove('category-active');});
	document.querySelector('[href="' + category + '"]').classList.add('category-active');
	document.querySelector(category).classList.add('category-active');
}
window.onhashchange = function() {
	choose_category(window.location.hash);
}
choose_category(window.location.hash);
</script>

<?php get_footer() ?>
