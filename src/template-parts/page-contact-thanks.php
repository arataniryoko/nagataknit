<?php
/*
Template Name: contact-thanks
 */
get_header();

 ?>

 <main id="contact" class="contact l-main">

	 <section class="l-pagetitle js-scpoint">
		 <div class="l-pagetitle__text">
			 <h1 class="title m-serif">お問い合わせ</h1>
		 </div>
	 </section>

   <section class="contact-content">
     <div class="l-container">
       <?php echo do_shortcode('[mwform_formkey key="46"]'); ?>
     </div>
   </section>

 </main>

 <?php get_footer(); ?>
