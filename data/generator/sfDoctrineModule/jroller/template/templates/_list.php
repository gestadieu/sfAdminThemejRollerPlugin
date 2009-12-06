<div class="sf_admin_list ui-grid-table ui-widget ui-corner-all ui-helper-reset ui-helper-clearfix">
  [?php if (!$pager->getNbResults()): ?]

  <table>
    <caption class="fg-toolbar ui-widget-header ui-corner-top">
      <?php if ($this->configuration->hasFilterForm()): ?>
      <div id="sf_admin_filters_buttons" class="fg-buttonset fg-buttonset-multi ui-state-default">
        <a href="#sf_admin_filter" id="sf_admin_filter_button" class="fg-button ui-state-default fg-button-icon-left ui-corner-left">[?php echo UIHelper::addIconByConf('filters') . __('Filters', array(), 'sf_admin') ?]</a>
        [?php echo link_to(UIHelper::addIconByConf('reset') . __('Reset', array(), 'sf_admin'), '<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post', 'class' => 'fg-button ui-state-default fg-button-icon-left ui-corner-right')) ?]</span>
      </div>
      <?php endif; ?>
      <h1><span class="ui-icon ui-icon-triangle-1-s"></span> [?php echo <?php echo $this->getI18NString('list.title') ?> ?]</h1>
    </caption>
    <tbody>
      <tr class="sf_admin_row ui-widget-content">
        <td align="center" height="30">
          <p align="center">[?php echo __('No result', array(), 'sf_admin') ?]</p>
        </td>
      </tr>
    </tbody>
  </table>

  [?php else: ?]

  <table>
    <caption class="fg-toolbar ui-widget-header ui-corner-top">
      <?php if ($this->configuration->hasFilterForm()): ?>
      <div id="sf_admin_filters_buttons" class="fg-buttonset fg-buttonset-multi ui-state-default">
        <a href="#sf_admin_filter" id="sf_admin_filter_button" class="fg-button ui-state-default fg-button-icon-left ui-corner-left">[?php echo UIHelper::addIconByConf('filters') . __('Filters', array(), 'sf_admin') ?]</a>
        [?php $isDisabledResetButton = ($hasFilters->getRawValue()) ? '' : ' ui-state-disabled' ?]
        [?php echo link_to(UIHelper::addIconByConf('reset') . __('Reset', array(), 'sf_admin'), '<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post', 'class' => 'fg-button ui-state-default fg-button-icon-left ui-corner-right'.$isDisabledResetButton)) ?]</span>
      </div>
      <?php endif; ?>
      <h1><span class="ui-icon ui-icon-triangle-1-s"></span> [?php echo <?php echo $this->getI18NString('list.title') ?> ?]</h1>
    </caption>

    <thead class="ui-widget-header">
      <tr>
        <?php if ($this->configuration->getValue('list.batch_actions')): ?>
          <th id="sf_admin_list_batch_actions"  class="ui-state-default ui-th-column"><input id="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" /></th>
        <?php endif; ?>

        [?php include_partial('<?php echo $this->getModuleName() ?>/list_th_<?php echo $this->configuration->getValue('list.layout') ?>', array('sort' => $sort)) ?]

        <?php if ($this->configuration->getValue('list.object_actions')): ?>
          <th id="sf_admin_list_th_actions" class="ui-state-default ui-th-column">[?php echo __('Actions', array(), 'sf_admin') ?]</th>
        <?php endif; ?>
      </tr>
    </thead>

    <tfoot>
      <tr>
        <th colspan="<?php echo count($this->configuration->getValue('list.display')) + ($this->configuration->getValue('list.object_actions') ? 1 : 0) + ($this->configuration->getValue('list.batch_actions') ? 1 : 0) ?>">
          <div class="ui-state-default ui-th-column ui-corner-bottom">
            [?php include_partial('<?php echo $this->getModuleName() ?>/pagination', array('pager' => $pager)) ?]
          </div>
        </th>
      </tr>
    </tfoot>

    <tbody>
      [?php foreach ($pager->getResults() as $i => $<?php echo $this->getSingularName() ?>): $odd = fmod(++$i, 2) ? ' odd' : '' ?]
        <tr class="sf_admin_row ui-widget-content [?php echo $odd ?]">
          <?php if ($this->configuration->getValue('list.batch_actions')): ?>
            [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_batch_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'helper' => $helper)) ?]
          <?php endif; ?>

          [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_<?php echo $this->configuration->getValue('list.layout') ?>', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)) ?]

          <?php if ($this->configuration->getValue('list.object_actions')): ?>
            [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'helper' => $helper)) ?]
          <?php endif; ?>
        </tr>
      [?php endforeach; ?]
    </tbody>
  </table>

  [?php endif; ?]
</div>

<script type="text/javascript">
/* <![CDATA[ */
function checkAll()
{
  var boxes = document.getElementsByTagName('input'); for(var index = 0; index < boxes.length; index++) { box = boxes[index]; if (box.type == 'checkbox' && box.className == 'sf_admin_batch_checkbox') box.checked = document.getElementById('sf_admin_list_batch_checkbox').checked } return true;
}
/* ]]> */
</script>
