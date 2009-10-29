[?php include_stylesheets_for_form($form) ?]
[?php include_javascripts_for_form($form) ?]

<div class="sf_admin_filter ui-helper-reset ui-helper-clearfix" id="sf_admin_filter" title="[?php echo __('Filters')?]">
  [?php if ($form->hasGlobalErrors()): ?]
    [?php echo $form->renderGlobalErrors() ?]
  [?php endif; ?]

  <form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter')) ?]" method="post">
    <table>
      <tfoot>
        <tr>
          <td colspan="2">
            <div style="text-align:right">
              [?php echo $form->renderHiddenFields() ?]
              [?php echo link_to(__('Reset', array(), 'sf_admin'), '<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post', 'class' =>  'fg-button ui-state-default ui-corner-all', 'id' => 'sf_admin_filter_reset')) ?]
              <input type="submit" value="TEST [?php echo __('Filter', array(), 'sf_admin') ?]" class="fg-button ui-state-default ui-corner-all" id="sf_admin_filter_submit" />
            </div>
          </td>
        </tr>
      </tfoot>
      <tbody>
        [?php foreach ($configuration->getFormFilterFields($form) as $name => $field): ?]
          [?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?]
          [?php include_partial('<?php echo $this->getModuleName() ?>/filters_field', array(
            'name'       => $name,
            'attributes' => $field->getConfig('attributes', array()),
            'label'      => $field->getConfig('label'),
            'help'       => $field->getConfig('help'),
            'form'       => $form,
            'field'      => $field,
            'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_filter_field_'.$name,
          )) ?]
        [?php endforeach; ?]
      </tbody>
    </table>
  </form>
</div>
