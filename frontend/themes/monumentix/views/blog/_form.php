<?php
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

//use kartik\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model frontend\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">
  <div class="row">
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'summary')->textarea(['rows' => 6]) ?>

      </div>
        <div class="row">


          <?php if(empty($model->blog_image) == false) : ?>

            <div class="col-sm-5 text-center">
              <?= $form->field($model, 'image')->fileInput(); ?>
              <p>To remove the existing image, choose this checkbox</p>
              <?=$form->field($model, 'imageDelete')->checkbox();?>
            </div>
            <div class="col-sm-7">
              <img class="center-block img img-thumbnail img-blog-view" src="/<?=$model->blog_image?>">
            </div>

          <?php else: ?>
            <?= $form->field($model, 'image')->fileInput(); ?>
          <?php endif; ?>



        </div>
        <div class="row"


        <?= $form->field($model, 'content')->widget(CKEditor::className(),
            ['editorOptions' => [ 'preset' => 'full', 'inline' => false]]); ?>

        <?= $form->field($model, 'tags')->textInput(['maxlength' => 255]) ?>
      </div>
    <div class="row">
    <div class="col-lg-6">

        <?= $form->field($model, 'status')->dropDownList($model->statusList) ?>

        <?php /* = $form->field($model, 'category')->dropDownList($model->categoryList) */?>

    </div>
    </div>

    <div class="row">
      <div class="form-group">
          <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create')
              : Yii::t('app', 'Update'), ['class' => $model->isNewRecord
              ? 'btn btn-success' : 'btn btn-primary']) ?>

          <?= Html::a(Yii::t('app', 'Cancel'), ['article/index'], ['class' => 'btn btn-default']) ?>
      </div>
    </div>

    <div class="row">
      <?php ActiveForm::end(); ?>
    </div>

</div>
