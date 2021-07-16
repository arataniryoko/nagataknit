<?php get_header(); ?>

<main id="front" class="front">
  <section class="mainvis js-scpoint">
    <div class="l-container--lg">
      <div class="mainvis-copy">
        <p class="ja m-serif">糸を通して<br>人と人をつなぐ</p>
        <p class="en m-en--serif">Connecting people through threads.</p>
      </div>
    </div>
  </section>
  <section class="about">
    <div class="l-container--lg">
      <div class="m-sectitle">
        <h2 class="m-en--serif"><span class="num m-en">01</span>ABOUT</h2>
      </div>
      <div class="about-block1">
        <div class="about-block1__textbody about-textbody">
          <p class="lead m-serif">大手アパレルや下着メーカーの<br>OEM生産を行っています。</p>
          <p class="text">弊社のOEM事業は、豊富な経験を活かし、メーカーさま・卸さま・小売店さまの商品企画や開発、生産、そして納品までトータルサポートをしております。生産量や価格、納期などの条件に合わせて、最適なプランを提案いたします。お気軽にご相談ください。</p>
          <div class="m-btn">
            <a href="<?php echo home_url(); ?>/products/"><span class="arrow"></span>製品案内はこちら</a>
          </div>
        </div>
        <div class="about-block1__image">
          <figure class="main">
            <img src="<?php echo get_template_directory_uri(); ?>/img/front_about_block1_image_main.jpg" alt="長田ニットは女性用インナーおよびアウターファッションレースの企画から製造及び販売を行っています。">
          </figure>
          <figure class="sub">
            <img src="<?php echo get_template_directory_uri(); ?>/img/front_about_block1_image_sub.jpg" alt="">
          </figure>
        </div>
      </div>
      <div class="about-block2">
        <div class="about-block2__inner">
          <div class="about-block2__textbody about-textbody">
            <p class="lead m-serif">企画・開発はもちろん、<br>原糸をつくって生産まで全て自社一貫型</p>
            <p class="text">基本的な補正下着やランジェリー、インナーウェアなどを中心に企画・製造・販売まで一貫して行っております。中小から大手までの様々なクライアント様のご要望に沿った商品の開発と生産が可能です。品質へのこだわりと、安定した商品供給を追求しています。</p>
            <div class="m-btn">
              <a href="<?php echo home_url(); ?>/products/"><span class="arrow"></span>製品案内はこちら</a>
            </div>
          </div>
          <figure class="about-block2__image">
            <img src="<?php echo get_template_directory_uri(); ?>/img/front_about_block2_image.jpg" alt="">
          </figure>
        </div>
        <div class="about-block2__gallery">
          <figure class="item">
            <img src="<?php echo get_template_directory_uri(); ?>/img/front_about_block2_gallery1.jpg" alt="">
          </figure>
          <figure class="item">
            <img src="<?php echo get_template_directory_uri(); ?>/img/front_about_block2_gallery2.jpg" alt="">
          </figure>
          <figure class="item">
            <img src="<?php echo get_template_directory_uri(); ?>/img/front_about_block2_gallery3.jpg" alt="">
          </figure>
          <figure class="item">
            <img src="<?php echo get_template_directory_uri(); ?>/img/front_about_block2_gallery4.jpg" alt="">
          </figure>
        </div>
      </div>
    </div>
  </section>
  <section class="blog">
    <div class="m-sectitle">
      <div class="l-container--lg">
        <h2 class="m-en--serif"><span class="num m-en">02</span>BLOG</h2>
      </div>
    </div>
    <div class="blog-content">
      <div class="l-container--lg">
        <?php
					$newstoplist = get_posts( array(
					 'post_type' => 'blog',
					 'posts_per_page' => 1
					));
				foreach( $newstoplist as $post ):
				setup_postdata( $post );
				?>
        <div class="blog-content__pickup">
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
            <div class="textbody">
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
            </div>
          </a>
        </div>
        <?php
					endforeach;
					wp_reset_postdata();
				?>
        <ul class="blog-content__list">
          <?php
  					$newstoplist = get_posts( array(
  					 'post_type' => 'blog',
             'offset' => 1,
  					 'posts_per_page' => 5,
  					));
  				foreach( $newstoplist as $post ):
  				setup_postdata( $post );
  				?>
          <li class="list-item">
            <a href="<?php the_permalink(); ?>">
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
          </li>
          <?php
  					endforeach;
  					wp_reset_postdata();
  				?>
        </ul>
      </div>
    </div>
  </section>
  <section class="recruit">
    <div class="recruit-content">
      <div class="l-container--lg">
        <div class="inner">
          <div class="m-sectitle">
            <h2 class="m-en--serif"><span class="num m-en">03</span>RECRUIT</h2>
          </div>
          <p class="text">長田ニットは一緒に働くメンバーを募集しています。未経験者も大歓迎です。<br>面接時に工場見学を行いますが、事前見学も可能です。<br>まずは採用情報をご確認の上ご応募お待ちしております。</p>
          <div class="m-btn">
            <a href="<?php echo home_url(); ?>/recruit/"><span class="arrow"></span>採用情報を詳しく見る</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="contact">
    <div class="l-container">
      <div class="m-sectitle">
        <h2 class="m-en--serif"><span class="num m-en">04</span>CONTACT</h2>
      </div>
      <p class="contact-text">長田ニットではクリル給糸付ピエゾージャガードラッセル機を導入しており、<br class="pc">組み立てる柄・組織を自由にレイアウトすることが可能です。お打ち合わせの上ご希望の製品を製造いたします。<br>多品種、小ロットにも対応しておりますのでお気軽にお問い合わせください。</p>
      <div class="contact-btn">
        <a href="<?php echo home_url(); ?>/contact/">お問い合わせはこちら</a>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
