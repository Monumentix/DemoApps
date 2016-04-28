<div class="apidemo-default-index">
  <div class="row">
    <h1><?= $this->context->action->uniqueId ?></h1>
  </div>
  <div class="row">
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <h3>Hey there </h3>
      <code>
          <?php
          //print_r($response['categories']);
          ?>
      </code>
    </div>
  </div>

</div>
