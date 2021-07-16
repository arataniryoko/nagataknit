<?php get_header(); ?>
<main id="page" class="single">
	<div class="page-header">
		<div class="container">
			<div class="page-header__container">
				<h2>お知らせ</h2>
				<div class="en">news</div>
			</div>
		</div>
	</div>
  <article class="entry">
		<div class="container">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<header>
				<div class="entry__info">
					<div class="entry__date"><?php the_time('Y.m.d'); ?></div>
					<div class="entry__category"><?php the_category(); ?></div>
				</div>
				<h1 class="entry__title"><?php the_title(); ?></h1>
				<?php
				if ( has_post_thumbnail() ) : ?>
					<div class="entry__thumbnail">
					<?php the_post_thumbnail(); ?>
				</div>
				<?php endif; ?>
			</header>
			<div class="entry__body">
				<?php the_content(); ?>
			</div>
			<?php endwhile; ?>
			<div class="entry__back-button">
				<a href="<?php echo home_url('news'); ?>">一覧に戻る<img src="<?php echo get_template_directory_uri(); ?>/img/back-button_icon.svg" ></a>
			</div>
		</div>
	</article>
</main>
<?php get_footer(); ?>

