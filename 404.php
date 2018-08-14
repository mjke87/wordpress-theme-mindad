<?php
/**
 * @package WordPress
 * @subpackage mindad
 *
 * Shows an error page with poem if a page cannot be found.
 */
?>

<?php get_header(); ?>

	<h2>404&mdash;<?php _e('Lost', 'mindad'); ?></h2>

	<?php get_search_form(); ?>

	<article class="post">

		<br />

		<?php _e(
		'<p>Lost in the forest, I broke off a dark twig<br/>
		and lifted its whisper to my thirsty lips:<br/>
		maybe it was the voice of the rain crying,<br/>
		a cracked bell, or a torn heart.</p>

		<p>Something from far off it seemed<br/>
		deep and secret to me, hidden by the earth,<br/>
		a shout muffled by huge autumns,<br/>
		by the moist half-open darkness of the leaves.</p>

		<p>Wakening from the dreaming forest there, the hazel-sprig<br/>
		sang under my tongue, its drifting fragrance<br/>
		climbed up through my conscious mind</p>

		<p>as if suddenly the roots I had left behind<br/>
		cried out to me, the land I had lost with my childhood&mdash;<br/>
		and I stopped, wounded by the wandering scent.</p>

		<p><small><em>&mdash; Lost In The Forest by Pablo Neruda</em></small></p>'
		, 'mindad'); ?>

	</article>

<?php get_footer(); ?>