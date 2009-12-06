[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]

<div id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
  <div class="fg-toolbar ui-widget-header ui-corner-all">
    <h1>[?php echo <?php echo $this->getI18NString('show.title') ?> ?]</h1>
  </div>

  <div class="sf_admin_actions_block ui-widget">
      [?php include_partial('<?php echo $this->getModuleName() ?>/show_actions', array('form' => $form, '<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'configuration' => $configuration, 'helper' => $helper)) ?]
  </div>

  <div class="ui-helper-clearfix"></div>

  [?php include_partial('show', array('form' => $form, '<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'configuration' => $configuration)) ?]

  [?php include_partial('<?php echo $this->getModuleName() ?>/themeswitcher') ?]
</div>
