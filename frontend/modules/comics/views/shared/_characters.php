<?php if(isset($series['characters']) && !empty($series['characters'])) : ?>
  <div class="panel panel-monumentix">
    <div class='panel-heading'>
      <h3 class="panel-title">Characters (<?=$series['characters']['available']?>)</h3>
    </div>
    <div class='panel-body'></div>
    <div class='panel-footer '>
      <p class="text-center limited-to">Limited to <b><?=$series['characters']['returned']?><b> results.</p>
    </div>
  </div>
<?php endif ?>
