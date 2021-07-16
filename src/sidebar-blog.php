<?php ?>
<aside id="sub">
	<div class="bnr">
		sidebar-custom.php
	</div>

	<div class="box">
		<p class="title_sub">最新の投稿</p>
		<ul>
		<?php
                $toplist = array(
                'post_type' => array('custom'),
                'showposts' => 5
                );
		query_posts($toplist);

		if (have_posts()):while (have_posts()):the_post();
                ?>
		    
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</li>	
                    <?php endwhile; endif; ?><?php wp_reset_query() ?>
		</ul>
	</div>

	<div class="box">
		<p class="title_sub">CATEGORY</p>
		<ul>
			<?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'customcat', 'show_count' => 1)); ?>
		</ul>
	</div>

	<div class="box">
		<p class="title_sub">ARCHIVES</p>
		<ul>
			<?php wp_get_archives('type=monthly&post_type=custom&show_post_count=true'); ?>
		</ul>
	</div>

</aside>