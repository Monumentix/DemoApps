<?php
use frontend\components\BlogPostWidget;
use kartik\icons\Icon;
?>

<footer class="footer">
  <div class="container">

    <!-- LOWER third -->
    <div class="row">
      <div class="col-md-2 col-sm-6">
        <h4>Quick Links:</h4>
        <ul id="quicklinks">
          <li> <a href="/#about"><?=Icon::show('info-circle')?>About Me</a></li>
          <li> <a href="/#contact"><?=Icon::show('envelope')?>Contact Me</a></li>
          <li> <a href="/#showcase"><?=Icon::show('bullhorn')?>Spotlight Project</a></li>
          <li> <a href="/blog"><?=Icon::show('rss-square')?>Blog</a></li>
          <li> <a href="http://github.com/Monumentix" target="_blank"><?=Icon::show('github')?>GitHub</a></li>
        </ul>
      </div>
      <div class="col-md-2 col-sm-6">
        <h4>Demo My Work</h4>
        <p>Interact with a demo application.</p>
        <a class="btn btn-sm btn-warning btn-no-shadow btn-dark-text" href="#"><?=Icon::show('server');?> Demo & Samples</a>
      </div>
      <div class="col-md-6 col-sm-12">
        <?php //=BlogPostWidget::widget(['postCount'=>1]) ?>
      </div>
      <div class="col-md-2 col-sm-6">
        <h4>Get In Touch:</h4>
        <address>
          <strong>Monumentix / Brian Ridsdale </strong><br>
          15 Colonial Terrace <br>
          Pompton Plains, NJ 07444<br>
          <abb title="Phone">P:</abbr>&nbsp;(973)671-8326
        </address>
        <p class="text-center">
          <a class="btn btn-sm btn-primary" href="/#contact"><?=Icon::show('envelope');?> Contact Me </a>
        </p>


      </div>
    </div>
    <!-- LOWER third -->

    <hr>

    <!-- copywright -->
    <div class="row">
      <div class="col-md-6">
        <p class="text-left">&copy; <?= Yii::t('app', Yii::$app->name) ?> <?= date('Y') ?></p>
      </div>
      <div class="col-md-6">
        <p class="text-right"><?= Yii::powered() ?></p>
      </div>
    </div>
    <!-- copywright -->


  </div>

</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
