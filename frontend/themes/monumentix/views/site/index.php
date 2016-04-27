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
    <div class="col-sm-9">
      <div class="introBlock">
        <div class="jumbotron">
          <h1>Common Buisness Scenarios</h1>
          <p>Small samples to some common buisness problems using principals and concepts from Applications i have developed.  These solutions are not intended to be complete packages, instead focusing on core skills.  Login Information and Sample data is provided where neccessary. </p>

        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="authorBlock">
        <img src="<?=$this->theme->baseUrl?>/images/coder.jpg" class="contact-image img-circle img-coder-logo-thumb img-responsive center-block" alt="">

        <div class="contact-info">
            <p>Brian Ridsdale</p>
              <p>15 Colonial Terrace</p>
              <p>Pompton Plains, NJ 07444</p>
              <p>973-671-8326</p>
        </div>


      </div>



    </div>
  </div>

  <hr class="seperator">

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
