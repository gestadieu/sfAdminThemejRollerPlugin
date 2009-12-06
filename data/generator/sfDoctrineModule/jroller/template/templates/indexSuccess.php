[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]

<div id="sf_admin_container">
  [?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]

  <div id="sf_admin_header">
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_header', array('pager' => $pager)) ?]
  </div>

  <?php if ($this->configuration->hasFilterForm()): ?>
    <div id="sf_admin_bar ui-helper-hidden" style="display:none">
      [?php include_partial('<?php echo $this->getModuleName() ?>/filters', array('form' => $filters, 'configuration' => $configuration)) ?]
    </div>
  <?php endif; ?>

  <div id="sf_admin_content">
    <?php if ($this->configuration->getValue('list.batch_actions')): ?>
      <form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'batch')) ?]" method="post" id="sf_admin_content_form">
    <?php endif; ?>

      <div class="sf_admin_actions_block float<?php echo sfConfig::get('app_sf_admin_theme_jroller_plugin_list_actions_position') ?>">
      	<a tabindex="0" href="#sf_admin_actions_menu" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="sf_admin_actions_button">
      	  <span class="ui-icon ui-icon-triangle-1-s"></span>
      	  [?php echo __('Actions') ?]
      	</a>
      	<div id="sf_admin_actions_menu" class="ui-helper-hidden fg-menu fg-menu-has-icons">
      		<ul class="sf_admin_actions" id="sf_admin_actions_menu_list">
      			[?php include_partial('<?php echo $this->getModuleName() ?>/list_actions', array('helper' => $helper)) ?]
      		</ul>
      	</div>
      </div>

      [?php include_partial('<?php echo $this->getModuleName() ?>/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'hasFilters' => $hasFilters)) ?]

      <ul class="sf_admin_actions">
        [?php include_partial('<?php echo $this->getModuleName() ?>/list_batch_actions', array('helper' => $helper)) ?]
      </ul>

    <?php if ($this->configuration->getValue('list.batch_actions')): ?>
      </form>
    <?php endif; ?>
  </div>

  <div id="sf_admin_footer">
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_footer', array('pager' => $pager)) ?]
  </div>

  [?php include_partial('<?php echo $this->getModuleName() ?>/themeswitcher') ?]
</div>
