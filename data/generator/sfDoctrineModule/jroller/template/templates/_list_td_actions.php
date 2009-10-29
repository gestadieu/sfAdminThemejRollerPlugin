<td style="white-space: nowrap;">
  <ul class="sf_admin_td_actions fg-buttonset fg-buttonset-single">
  <?php foreach ($this->configuration->getValue('list.object_actions') as $name => $params): ?>
    <?php
    if (!key_exists('ui-icon', $params)) $params['ui-icon'] = '';
    $params['params'] = UIHelper::addClasses($params, 'fg-button-mini');
    ?>

    <?php if ('_delete' == $name): ?>
      <?php echo $this->addCredentialCondition('[?php echo $helper->linkToDelete($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>

    <?php elseif ('_edit' == $name): ?>
      <?php echo $this->addCredentialCondition('[?php echo $helper->linkToEdit($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>

    <?php elseif ('_show' == $name): ?>
      <?php echo $this->addCredentialCondition('[?php echo $helper->linkToShow($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>

    <?php else: ?>
      <li class="sf_admin_action_<?php echo $params['class_suffix'] ?>">
        <?php $params['label'] .= UIHelper::addIcon($params); ?>
        <?php echo $this->addCredentialCondition($this->getLinkToAction($name, $params, true), $params) ?>
      </li>
    <?php endif; ?>
  <?php endforeach; ?>
  </ul>
</td>
