<?php if(isset($series['stories']) && !empty($series['stories'])) : ?>
  <div class="panel panel-monumentix">
    <div class='panel-heading'>
      <h3 class="panel-title">Stories (<?=$series['stories']['available']?>)</h3>
    </div>
    <div class='panel-body'>


    </div>
    <div class='panel-footer '>
      <p class="text-center limited-to">Limited to <b><?=$series['stories']['returned']?><b> results.</p>
    </div>
  </div>
<?php endif ?>
