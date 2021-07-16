<?php ?>

<footer class="footer">

  <div class="l-container--lg">
    <figure class="footer-logo">
      <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="長田ニット">
    </figure>
    <div class="footer-content">
      <div class="footer-content__company">
        <p class="title m-en--serif">COMPANY</p>
        <p class="name">長田ニット株式会社</p>
        <dl class="info">
          <dt>本社工場</dt>
          <dd>石川県かほく市鉢伏ト7番地<br>TEL  076-283-0917　FAX  076-283-4317</dd>
          <dt>森工場</dt>
          <dd>石川県かほく市森ル57番地<br>TEL  076-283-5823　FAX  076-283-5723</dd>
        </dl>
      </div>
      <div class="footer-content__gnav">
        <p class="title m-en--serif">CONTENTS</p>
        <ul class="nav">
          <li class="nav-item"><a href="<?php echo home_url(); ?>/product/">製品案内</a></li>
          <li class="nav-item"><a href="<?php echo home_url(); ?>/company/">会社概要</a></li>
          <li class="nav-item"><a href="<?php echo home_url(); ?>/blog/">ブログ</a></li>
          <li class="nav-item"><a href="<?php echo home_url(); ?>/recruit/">採用情報</a></li>
          <li class="nav-item"><a href="<?php echo home_url(); ?>/privacy/">プライバシーポリシー</a></li>
        </ul>
      </div>
    </div>
    <p class="copyright m-en">® 2021 NAGATA KNIT</p>
  </div>

</footer>

<!-- wp_footer -->
<?php wp_footer(); ?>
<!-- /wp_footer -->

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugins/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugins/script.js"></script>

</body>

</html>
