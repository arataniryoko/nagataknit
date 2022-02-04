<?php
/*
Template Name: recruit
 */
get_header();

 ?>

 <main id="recruit" class="recruit l-main">

	 <section class="l-pagetitle js-scpoint">
		 <div class="l-pagetitle__text">
			 <h1 class="title m-serif">採用情報</h1>
			 <p class="text m-serif">長田ニットの採用情報ページです。</p>
		 </div>
	 </section>

   <?php if (is_user_logged_in()){ ?>

     <section class="recruit-content">
       <div class="l-container">
  			 <div class="m-sectitle">
           <h2 class="m-en--serif">RECRUIT</h2>
           <p class="subtitle m-serif">募集要項</p>
         </div>
         <p class="recruit-content__lead m-serif">長田ニットでは、ともに成長しながら、<br>可能性を広げていけるメンバーを随時募集しております。</p>
         <div class="recruit-content__gallery">
           <figure class="item">
               <img src="<?php echo get_template_directory_uri(); ?>/img/recruit_gallery1.jpg" alt="">
           </figure>
           <figure class="item">
               <img src="<?php echo get_template_directory_uri(); ?>/img/recruit_gallery2.jpg" alt="">
           </figure>
           <figure class="item">
               <img src="<?php echo get_template_directory_uri(); ?>/img/recruit_gallery3.jpg" alt="">
           </figure>
         </div>
         <div class="recruit-content__info">
           <table>
             <tbody>
               <tr>
                 <th>募集職種</th>
                 <td>
                   【総合職】
                   <ol>
                     <li>営業職</li>
                     <li>企画職</li>
                     <li>デザイン職</li>
                   </ol>
                 </td>
               </tr>
               <tr>
                 <th>勤務地</th>
                 <td>【本社】石川県かほく市鉢伏ト７番地</td>
               </tr>
               <tr>
                 <th>勤務時間</th>
                 <td>8：00 〜 17：00（実働8時間）</td>
               </tr>
               <tr>
                 <th>給与</th>
                 <td>当社規定による（通勤手当、資格手当等　別途規程により支給）</td>
               </tr>
               <tr>
                 <th>昇給／賞与</th>
                 <td>年1回（査定に基づく）／年2回（業績による）</td>
               </tr>
               <tr>
                 <th>休日／休暇</th>
                 <td>完全週休2日制（土・日・祝）、年間休日120日、有給休暇（17～20日）、 リフレッシュ休暇、介護休暇、育児休業など</td>
               </tr>
               <tr>
                 <th>福利厚生</th>
                 <td>
                   <ul>
                     <li>各種社会保険完備</li>
                     <li>定期健康診断</li>
                   </ul>
                 </td>
               </tr>
               <tr>
                 <th>選考プロセス</th>
                 <td>
                   <div class="step">
                     <p class="step-text1"><span>STEP 1</span>書類選考</p>
                     <p class="step-text1"><span>STEP 2</span>1次面接</p>
                     <p class="step-text1"><span>STEP 3</span>2次面接（社長面接）</p>
                     <p class="step-text2">内定</p>
                   </div>
                 </td>
               </tr>
               <tr>
                 <th>提出書類</th>
                 <td>
                   <ul>
                     <li>履歴書（写真添付）</li>
                     <li>職務履歴書</li>
                   </ul>
                 </td>
               </tr>
             </tbody>
           </table>
           <div class="btn">
             <a href="<?php echo home_url(); ?>/entry/">エントリー</a>
           </div>
         </div>
       </div>
     </section>

   <?php }else{ ?>

     <section class="recruit-content">
       <div class="l-container">
  			 <p class="recruit-content__lead m-serif">令和3年度の募集は終了しました。</p>
       </div>
     </section>

   <?php } ?>



 </main>

 <?php get_footer(); ?>
