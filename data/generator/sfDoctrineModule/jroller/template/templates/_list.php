<div class="sf_admin_list ui-grid-table ui-widget ui-corner-all ui-helper-reset ui-helper-clearfix">
  [?php if (!$pager->getNbResults()): ?]

    <p>[?php echo __('No result', array(), 'sf_admin') ?] 
		<?php if ($this->configuration->hasFilterForm()): ?>
		[?php echo link_to(__('Reset', array(), 'sf_admin'), '<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post', 'class' =>  'ui-state-default ui-corner-all sf_button', 'id' => 'sf_admin_filter_reset')) ?]</p>
		<?php endif; ?>
  	
  [?php else: ?]    
    <table cellspacing="0">
			<caption class="ui-widget-header ui-corner-top" align="top">
				<?php if ($this->configuration->hasFilterForm()): ?>
				<span class="ui-state-default ui-corner-all sf_button" id="sf_admin_filter_button"><a href="#sf_admin_filter" class="sf_button-icon-right"><span class="ui-icon ui-icon-gear"></span>[?php echo __('Filters') ?]</a></span>
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
							[?php //if ($pager->haveToPaginate()): ?]
	              [?php include_partial('<?php echo $this->getModuleName() ?>/pagination', array('pager' => $pager)) ?]
	            [?php //endif; ?]
<!--
	            [?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults(), 'sf_admin') ?]
	            [?php if ($pager->haveToPaginate()): ?]
	              [?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?]
	            [?php endif; ?]
-->
						</div></th></tr></tfoot>
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
