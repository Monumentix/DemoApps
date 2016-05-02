<?php if(isset($series['creators']) && !empty($series['creators'])) : ?>
  <div class="panel panel-monumentix">
    <div class='panel-heading'>
      <h3 class="panel-title">Creators (<?=$series['creators']['available']?>)</h3>
    </div>
    <div class='panel-body'></div>
    <div class='panel-footer'>
      <p class="text-center limited-to">Limited to <b><?=$series['creators']['returned']?><b> results.</p>
    </div>
  </div>
<?php endif ?>
