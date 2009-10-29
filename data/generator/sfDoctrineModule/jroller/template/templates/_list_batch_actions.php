<?php if ($listActions = $this->configuration->getValue('list.batch_actions')): ?>
<li class="sf_admin_batch_actions_choice">
  <select name="batch_action">
    <option value="">[?php echo __('Choose an action', array(), 'sf_admin') ?]</option>
    <?php foreach ((array) $listActions as $action => $params): ?>
      <?php echo $this->addCredentialCondition('<option value="'.$action.'">[?php echo __(\''.$params['label'].'\', array(), \'sf_admin\') ?]</option>', $params) ?>
    <?php endforeach; ?>
  </select>
  [?php $form = new sfForm(); if ($form->isCSRFProtected()): ?]
    <input type="hidden" name="[?php echo $form->getCSRFFieldName() ?]" value="[?php echo $form->getCSRFToken() ?]" />
  [?php endif; ?]

  <!--<input type="submit" value="[?php echo __('go', array(), 'sf_admin') ?]" class="fg-button ui-state-default ui-corner-right"/>-->
  <input type="submit" value="[?php echo __('go', array(), 'sf_admin') ?]" class="ui-button ui-state-default ui-corner-all"/>
  <!--<button type="submit" class="fg-button ui-state-default fg-button-icon-right ui-corner-all">
    <span class="ui-icon ui-icon-check"></span>
    [?php echo __('go', array(), 'sf_admin') ?]
  </button>-->
</li>
<?php endif; ?>
