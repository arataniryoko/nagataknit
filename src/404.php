<?php get_header(); ?>
<main>
  <div id="notfound" class="notfound l-main">
    <section class="l-pagetitle js-scpoint">
 		 <div class="l-pagetitle__text">
 			 <h1 class="title m-serif">404 Not Found</h1>
 		 </div>
 	 </section>
   <section class="notfound-content">
     <div class="l-container">
       <p class="notfound-content__lead m-serif">お探しのページは見つかりません。</p>
       <p class="notfound-content__text">一時的にアクセスができない状況にあるか、移動もしくは削除された可能性があります。<br>トップページまたは下記リンクよりお探しください。</p>
       <div class="m-btn">
         <a href="<?php echo home_url(); ?>/"><span class="arrow"></span>トップに戻る</a>
       </div>
     </div>
   </section>
  </div>
</main>
<?php get_footer(); ?>
