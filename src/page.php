<?php get_header(); ?>
<main class="page">
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<?php get_template_part('template-parts/page-header') ?>

<div class="content">
	<div class="container">
	<?php the_content(); ?>
	</div>
</div>
<?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
