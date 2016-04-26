<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use frontend\widgets\Alert;
use kartik\icons\Icon;


/* @var $this yii\web\View */
$this->title = Yii::t('app', Yii::$app->name);
?>
<div class="site-index">
  <div class="row">
    <div class="col-sm-12">
      <br>
      <h2 class="text-center title">This is my demo area</h2>
      <h3>
      <br>
      <br>
      <br>
      <br>
    </div>
  </div>
  <div class="row">

    <div class="col-sm-4">
      <div class="panel panel-monumentix">
        <div class="panel-heading">
          <h3 class="panel-title">CRUD Samples</h3>
        </div>
        <div class="panel-body">
          <p>
            Create, Read, Update and Delete (acronym CRUD) are the four basic functions of persistent data storage as defined by Wikpedia.  Please note anything other READ, will require you to login using the supplied account information.
          </p>
          <p class=""><img class="img img-thumbnail img-responsive" src="http://placehold.it/350x150?text=Sample"></p>
        </div>
        <div class="panel-footer">
          <p class="summary">Project Notes:</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="panel panel-monumentix">
        <div class="panel-heading">
          <h3 class="panel-title">External API Usage </h3>
        </div>
        <div class="panel-body">
          <p>APIS are available for </p>
          <p class=""><img class="img img-thumbnail img-responsive" src="http://placehold.it/350x150?text=Sample"></p>
        </div>
        <div class="panel-footer">
          <p class="summary">Project Notes:</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="panel panel-monumentix">
        <div class="panel-heading">
          <h3 class="panel-title">Sample Area One</h3>
        </div>
        <div class="panel-body">
          <p>An area designed to show things about stuff.  The stuff does things for other things and allows more stuff to happen.</p>
          <p class=""><img class="img img-thumbnail img-responsive" src="http://placehold.it/350x150?text=Sample"></p>
        </div>
        <div class="panel-footer">
          <p class="summary">Project Notes:</p>
        </div>
      </div>
    </div>



  </div>
</div>
