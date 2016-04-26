<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use justinvoelker\tagging\TaggingWidget;
use frontend\components\BlogPostWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Blog');

$this->params['breadcrumbs'][] = Yii::t('app', 'Blog');
?>
<div class="blog-index">

  <div class="row">
    <div class="col-xs-12">
      <h1>
          <?= Html::encode($this->title) ?>
          <span class="small"> - <?= Yii::t('app', 'Latest news and information') ?></span>
      </h1>


      <hr class="blog-devider">


    </div>
  </div>
  <div class="row">
    <div class="col-md-9 col-sm-9">
    <?= ListView::widget([
        'summary' => false,
        'dataProvider' => $dataProvider,
        'emptyText' => Yii::t('app', 'We haven\'t created any blogs yet.'),
        'itemOptions' => ['class' => ''],
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('_index', ['model' => $model]);
        },
    ]) ?>
    </div>
    <div class="col-md-3 col-sm-3">
      <?=BlogPostWidget::widget(['postCount'=>5,'action'=>'latestTitles']) ?>
      <?=BlogPostWidget::widget(['postCount'=>5,'action'=>'archiveListing']) ?>


                <div class="panel panel-monumentix">
                  <div class="panel-heading">
                    <h3 class="panel-title">
                      Tags
                    </h3>
                  </div>
                  <div class="panel-body">
                    <?=TaggingWidget::widget([
                        'items'=>$tags,
                        'smallest'=>16,
                        'largest'=>22,
                        'unit'=>'px',
                        'format'=>'cloud',
                        ]);
                    ?>
                  </div>
                </div>
    </div>
  </div>


</div>
