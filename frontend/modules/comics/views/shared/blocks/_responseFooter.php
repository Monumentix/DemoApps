<?php

use yii\helpers\Html;
$showResponse = true;
?>


<?php if($showResponse == true):?>
<div class="row responseBlock">
  <div class="col-xs-12">
    <h3 class="text-center">Response Object</h3>
    <pre class="prettyprint ">
      <?php print_r($fullResponse); ?>
    </div>
  <hr class="comics-divider">
</div>
<?php endif ?>
