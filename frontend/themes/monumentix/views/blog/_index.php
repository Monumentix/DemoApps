<?php
use yii\helpers\Url;
use kartik\icons\Icon;

/* @var $this yii\web\View */
$this->title = 'Blogs';
?>

<div class="row blogPostOverview">
  <div class="col-sm-12">
    <h2 class="blog">
      <a href="<?= Url::to(['blog/view', 'id' => $model->id, 'slug'=>$model->slug])?> "> <?= $model->title ?></a>
    </h2>
    <p class="time">
      <?=Icon::show('clock-o');?>   <?= Yii::t('app','Published on').' '.date('M j, Y', $model->created_at) ?> - <?=$model->getAuthorName(); ?>
    </p>
  </div>
  <div class="col-sm-4 col-md-3 col-lg-2">
    <?php if(empty($model->blog_image) == false) : ?>
      <img class="img img-thumbnail img-blog-preview img-blog-main" src="/<?=$model->blog_image ?> ">
    <?php endif; ?>
  </div>
  <div class="col-sm-8 col-md-9 col-lg-10">
    <p><?= $model->summary ?></p>
    <a class="btn btn-xs btn-success shadow " href="<?= Url::to(['blog/view', 'id' => $model->id, 'slug'=>$model->slug]) ?>">

      <?= yii::t('app','Read more'); ?>
      &nbsp;
      <?=Icon::show('arrow-circle-right');?>

    </a>
  </div>
</div>

<hr class="blog-devider">
