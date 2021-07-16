<?php get_header(); ?>
<main>
<div class="page-header">
	<div class="container">
		<div class="page-header__container">
			<h1>お知らせ</h1>
			<div class="en">news</div>
		</div>
	</div>
</div>
<section class="article">
	<div class="container">
		<div class="article__container">
			<ul class="article__list">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
				<li class="article__item">
					<div class="date"><?php the_time('Y.m.d'); ?></div>
					<a href="<?php the_permalink(); ?>"> <div class="title"><?php the_title(); ?></div></a>
				</li>
				<?php endwhile; endif; ?>
			</ul>
		</div>
	</div>
</section>
<section class="pagination">
	<div class="container">
	<?php
		if( function_exists("the_pagination") ) {
			$pagination_array = the_pagination();
			// 配列じゃないなら非表示
			if ( !is_array($pagination_array) ) return;
			echo '<ul class="pagination__list">';
			foreach($pagination_array as $key => $val) {
				echo '<li class="pagination__item">'.$pagination_array[$key].'</li>';
			}
			echo '</ul>';
		}

?>
	</div>
</section>



</main>
<?php get_footer(); ?>
