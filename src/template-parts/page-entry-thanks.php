<?php
/*
Template Name: entry
 */
get_header();

 ?>

 <main id="entry" class="entry l-main">

	 <section class="l-pagetitle js-scpoint">
		 <div class="l-pagetitle__text">
			 <h1 class="title m-serif">エントリー</h1>
		 </div>
	 </section>

   <section class="entry-content">
     <div class="l-container">
       <?php echo do_shortcode('[mwform_formkey key="53"]'); ?>
     </div>
   </section>

 </main>

 <?php get_footer(); ?>
