<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\components\BlogPostWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-view">
    <div class="row">



      <div class="col-md-8">


        <h1><?= Html::encode($this->title) ?>
          <div class="pull-right">
          <?php if (Yii::$app->user->can('adminArticle')): ?>
              <?= Html::a(Yii::t('app', 'Back'), ['admin'], ['class' => 'btn btn-warning']) ?>
          <?php endif ?>

          <?php if (Yii::$app->user->can('updateArticle', ['model' => $model])): ?>
              <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
          <?php endif ?>

          <?php if (Yii::$app->user->can('deleteArticle')): ?>
              <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                  'class' => 'btn btn-danger',
                  'data' => [
                      'confirm' => Yii::t('app', 'Are you sure you want to delete this article?'),
                      'method' => 'post',
                  ],
              ]) ?>
          <?php endif ?>

          </div>
        </h1>

        <div class="row">
          <div class="col-sm-12 BlogAuthor">
            <p>Author: <?=$model->authorName?> - <?= date('M j, Y',$model->created_at) ?> </p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 blogSummary">
            <p><?=$model->summary?> </p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2 text-center">

            <?php if($model->blog_image === NULL || $model->blog_image == '') : ?>
              <?php //Do nothing since its empty ?>
            <?php else : ?>
              <img class="center-block img img-thumbnail img-blog-view " src="/<?=$model->blog_image ?> ">
            <?php endif; ?>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 blogContent">
              <?= $model->content; ?>
          </div>
        </div>
        <div class="row">

        </div>





        <?php  /* =DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                // [
                //     'label' => Yii::t('app', 'Author'),
                //     'value' => $model->authorName,
                // ],
                'title',
                'summary:ntext',
                'content:html',
                // [
                //     'label' => Yii::t('app', 'Status'),
                //     'value' => $model->statusName,
                // ],
                /*[
                    'label' => Yii::t('app', 'Category'),
                    'value' => $model->categoryName,
                ],*/
              /*  'created_at:dateTime',
                //'updated_at:dateTime',
            ],
        ])  */ ?>
      </div>
      <div class="col-md-4 text-center ">
        <img src="<?=$this->theme->baseUrl?>/images/coder.jpg" class="contact-image img-circle img-coder-logo-large img-responsive center-block" alt="">
        <Br>
        <div class="contact-info">
            <p>Brian Ridsdale</p>
              <p>15 Colonial Terrace</p>
              <p>Pompton Plains, NJ 07444</p>
              <p>973-671-8326</p>
          </div>

          <?=BlogPostWidget::widget(['postCount'=>5,'action'=>'latestTitles']) ?>
          <?=BlogPostWidget::widget(['postCount'=>5,'action'=>'archiveListing']) ?>




      </div>
    </div>


</div>
