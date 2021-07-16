<?php
/*
Template Name: products
 */
get_header();

 ?>

 <main id="products" class="products l-main">

	 <section class="l-pagetitle js-scpoint">
		 <div class="l-pagetitle__text">
			 <h1 class="title m-serif">製品案内</h1>
		 </div>
	 </section>

   <section class="products-list">
     <div class="l-container">
       <ul class="products-list__lists">
         <li class="item">
           <figure class="image">
             <img src="<?php echo get_template_directory_uri(); ?>/img/products_list_image1.jpg" alt="4709R">
           </figure>
           <p class="text m-serif">4709R</p>
         </li>
         <li class="item">
           <figure class="image">
             <img src="<?php echo get_template_directory_uri(); ?>/img/products_list_image2.jpg" alt="4714R">
           </figure>
           <p class="text m-serif">4714R</p>
         </li>
         <li class="item">
           <figure class="image">
             <img src="<?php echo get_template_directory_uri(); ?>/img/products_list_image3.jpg" alt="4734R">
           </figure>
           <p class="text m-serif">4734R</p>
         </li>
         <li class="item">
           <figure class="image">
             <img src="<?php echo get_template_directory_uri(); ?>/img/products_list_image4.jpg" alt="4735R">
           </figure>
           <p class="text m-serif">4735R</p>
         </li>
         <li class="item">
           <figure class="image">
             <img src="<?php echo get_template_directory_uri(); ?>/img/products_list_image5.jpg" alt="4736R">
           </figure>
           <p class="text m-serif">4736R</p>
         </li>
         <li class="item">
           <figure class="image">
             <img src="<?php echo get_template_directory_uri(); ?>/img/products_list_image6.jpg" alt="4740R">
           </figure>
           <p class="text m-serif">4740R</p>
         </li>
         <li class="item">
           <figure class="image">
             <img src="<?php echo get_template_directory_uri(); ?>/img/products_list_image7.jpg" alt="4741R">
           </figure>
           <p class="text m-serif">4741R</p>
         </li>
         <li class="item">
           <figure class="image">
             <img src="<?php echo get_template_directory_uri(); ?>/img/products_list_image8.jpg" alt="4773R">
           </figure>
           <p class="text m-serif">4773R</p>
         </li>
         <li class="item">
           <figure class="image">
             <img src="<?php echo get_template_directory_uri(); ?>/img/products_list_image9.jpg" alt="4841R">
           </figure>
           <p class="text m-serif">4841R</p>
         </li>
         <li class="item">
           <figure class="image">
             <img src="<?php echo get_template_directory_uri(); ?>/img/products_list_image10.jpg" alt="6018R">
           </figure>
           <p class="text m-serif">6018R</p>
         </li>
         <li class="item">
           <figure class="image">
             <img src="<?php echo get_template_directory_uri(); ?>/img/products_list_image11.jpg" alt="7831R">
           </figure>
           <p class="text m-serif">7831R</p>
         </li>
         <li class="item">
           <figure class="image">
             <img src="<?php echo get_template_directory_uri(); ?>/img/products_list_image12.jpg" alt="7832R">
           </figure>
           <p class="text m-serif">7832R</p>
         </li>
       </ul>
     </div>
   </section>

   <section class="products-process">
     <div class="l-container">
       <h2 class="products-process__title m-serif">生産過程</h2>
       <div class="products-process__chart">
         <ul>
           <li class="item"><p class="text">企画提案</p></li>
           <li class="item"><p class="text text--lg">デザイン・資材提案</p></li>
           <li class="item"><p class="text">パターン作成</p></li>
           <li class="item"><p class="text">サンプル作成</p></li>
           <li class="item"><p class="text">資材手配</p></li>
           <li class="item"><p class="text">生産</p></li>
           <li class="item"><p class="text">検品</p></li>
           <li class="item"><p class="text">納品</p></li>
         </ul>
       </div>
       <div class="products-process__flow">
         <div class="item">
           <h3 class="title">企画提案</h3>
           <div class="content">
             <figure class="image">
               <img src="<?php echo get_template_directory_uri(); ?>/img/products_flow_image1.jpg" alt="企画提案">
             </figure>
             <p class="text">デザインから素案作成まで、お客様と十分にコミュニケーションをとりながら、様々なご要望に柔軟に対応いたします。</p>
           </div>
         </div>
         <div class="item">
           <h3 class="title">サンプル作成</h3>
           <div class="content">
             <figure class="image">
               <img src="<?php echo get_template_directory_uri(); ?>/img/products_flow_image2.jpg" alt="サンプル作成">
             </figure>
             <p class="text">多種にわたる原糸からニーズに合った糸を選定し、迅速に対応いたします。またデザイン修正もその都度対応が可能です。</p>
           </div>
         </div>
         <div class="item">
           <h3 class="title">生産</h3>
           <div class="content">
             <figure class="image">
               <img src="<?php echo get_template_directory_uri(); ?>/img/products_flow_image3.jpg" alt="生産">
             </figure>
             <p class="text">海外生産に比べロスも少なく、品質にはこだわりを持ち、安定した製品をお届け致します。</p>
           </div>
         </div>
       </div>
     </div>
   </section>

 </main>

 <?php get_footer(); ?>
