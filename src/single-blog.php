<?php get_header(); ?>

<main id="blog" class="blogdetail l-main">

	<section class="l-pagetitle js-scpoint">
		<div class="l-pagetitle__text">
			<h1 class="title m-serif">ブログ</h1>
			<p class="text m-serif">弊社スタッフが、<br class="sm">日常の出来事や社内の活動などを<br class="md">綴っていきます。</p>
		</div>
	</section>

	<section class="blogdetail-content">
		<div class="l-container">
			<div class="blogdetail-content__head">
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
				<h1 class="title m-serif"><?php the_title(); ?></h1>
			</div>
			<div class="blogdetail-content__body">
				<?php the_content(); ?>
			</div>
		</div>
	</section>

	<section class="blogdetail-related">
		<div class="l-container">
			<h2 class="blogdetail-related__title">関連記事</h2>
			<div class="blogdetail-related__list l-bloglist">
				<?php
        $post_term = get_the_terms( $post->ID, 'blogcat' );
        $blog_term = $post_term[0]->slug;
          $blogrelatedlist = get_posts( array(
           'post_type' => 'blog',
           'post__not_in' => array($post -> ID), // 今読んでいる記事を除く
           'posts_per_page' => 3,
           'orderby' => 'rand',
           'tax_query'      => array(
              array(
                'taxonomy' => 'blogcat',  // カスタムタクソノミー名
                'field'    => 'slug',  // ターム名を term_id,slug,name のどれで指定するか
                'terms' => $blog_term,
              )
            )
          ));
          foreach( $blogrelatedlist as $post ):
          setup_postdata( $post );
        ?>
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
        <?php
					endforeach;
					wp_reset_postdata();
				?>
      </div>
			<div class="blogdetail-related__btn m-btn">
				<a href="<?php echo home_url(); ?>/blog/"><span class="arrow"></span>すべてみる</a>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
