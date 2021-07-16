<?php get_header(); ?>

<main id="blog" class="bloglist l-main">

	<section class="l-pagetitle js-scpoint">
		<div class="l-pagetitle__text">
			<h1 class="title m-serif">ブログ</h1>
			<p class="text m-serif">弊社スタッフが、<br class="sm">日常の出来事や社内の活動などを<br class="md">綴っていきます。</p>
		</div>
	</section>

	<section class="bloglist-category">
		<div class="l-container">
			<div class="bloglist-category__content">
				<h2 class="title">カテゴリー</h2>
				<ul>
					<?php
          $terms = get_terms( 'blogcat');
          foreach ( $terms as $term ) {
            echo '<li><a href="'.home_url().'/blogcat/'.$term->slug.'/">'.esc_html( $term->name ).'</a></li>';
          }
        ?>
				</ul>
			</div>
		</div>
	</section>

	<section class="bloglist-content">
		<div class="l-container">
			<div class="l-bloglist">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div class="l-bloglist-item">
						<a href="<?php the_permalink(); ?>">
							<figure class="thumb">
	              <?php if(get_field('blog-thumb')): ?>
	                  <?php
	                     $image = get_field('blog-thumb');
	                     $size = 'blog-thumb'; // (thumbnail, medium, large, full or custom size)
	                     if( $image ) {
	                         echo wp_get_attachment_image( $image, $size );
	                     }
	                   ?>
	                <?php else: ?>
	                  <img src="<?php echo get_template_directory_uri(); ?>/img/thumb_noimage.jpg" alt="no image">
	                <?php endif; ?>
	            </figure>
							<div class="info">
								<p class="date m-en"><?php the_time('Y.m.d'); ?></p>
								<ul>
									<?php
									$terms = get_the_terms($post->ID, 'blogcat');
									if ( $terms ) {
										foreach ( $terms as $term ) {
											$term_link = get_term_link( $term );
											echo '<li>'.$term->name.'</li>';
										}
									}
									?>
								</ul>
							</div>
							<h2 class="title m-serif"><?php the_title(); ?></h2>
							<p class="more"><span class="arrow"></span>more</p>
						</a>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>

	<section class="bloglist-pager">
		<div class="pager">
			<?php global $wp_rewrite;
        $paginate_base = get_pagenum_link(1);
        if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()) {
        $paginate_format = '';
        $paginate_base = add_query_arg('paged', '%#%');
            } else {
        $paginate_format = (substr($paginate_base, -1 ,1) == '/' ? '' : '/') .
        user_trailingslashit('page/%#%/', 'paged');;
        $paginate_base .= '%_%';
            }
          echo paginate_links( array(
          'base' => $paginate_base,
          'format' => $paginate_format,
          'total' => $wp_query->max_num_pages,
          'prev_text' => '<',
          'next_text' => '>',
          'mid_size' => 1,
          'current' => ($paged ? $paged : 1),
      )); ?>
		</div>
	</section>

</main>

<?php get_footer(); ?>
