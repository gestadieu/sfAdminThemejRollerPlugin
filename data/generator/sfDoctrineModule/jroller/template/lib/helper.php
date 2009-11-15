[?php

/**
 * <?php echo $this->getModuleName() ?> module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage <?php echo $this->getModuleName()."\n" ?>
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 12482 2008-10-31 11:13:22Z fabien $
 */
class Base<?php echo ucfirst($this->getModuleName()) ?>GeneratorHelper extends sfModelGeneratorHelper
{
  static protected $icons = null;

  public function linkToShow($object, $params)
  {
    $params['ui-icon'] = $this->getIcon('show', $params);
    return '<li class="sf_admin_action_show">'.link_to(UIHelper::addIcon($params) . __($params['label'], array(), 'sf_admin'), $this->getUrlForAction('show'), $object, $params['params']).'</li>';
  }

  public function linkToNew($params)
  {
    if (!key_exists('ui-icon', $params)) $params['ui-icon'] = '';
    $params['params'] = UIHelper::addClasses($params, '');
    $params['ui-icon'] = $this->getIcon('new', $params);
    return '<li class="sf_admin_action_new">'.link_to(UIHelper::addIcon($params) . __($params['label'] , array(), 'sf_admin'), '@'.$this->getUrlForAction('new'), $params['params']).'</li>';
  }

  public function linkToEdit($object, $params)
  {
    $params['ui-icon'] = $this->getIcon('edit', $params);
    return '<li class="sf_admin_action_edit">'.link_to(UIHelper::addIcon($params) . __($params['label'], array(), 'sf_admin'), $this->getUrlForAction('edit'), $object, $params['params']).'</li>';
  }

  public function linkToDelete($object, $params)
  {
    $params['params'] = UIHelper::arrayToString(array('class' => UIHelper::getClasses($params['params']).' ui-priority-secondary'));

    if ($object->isNew())
    {
      return '';
    }

    $params['ui-icon'] = $this->getIcon('delete', $params);
    return '<li class="sf_admin_action_delete">'.link_to(UIHelper::addIcon($params) . __($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('class' => UIHelper::getClasses($params['params']),'method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])).'</li>';
  }

  public function linkToList($params)
  {
    $params['ui-icon'] = $this->getIcon('list', $params);
    return '<li class="sf_admin_action_list">'.link_to(UIHelper::addIcon($params) . __($params['label'], array(), 'sf_admin'), '@'.$this->getUrlForAction('list'),$params['params']).'</li>';
  }

  public function linkToSave($object, $params)
  {
    $params['ui-icon'] = $this->getIcon('save', $params);
    return '<li class="sf_admin_action_save"><button type="submit" class="fg-button ui-state-default fg-button-icon-left">'. UIHelper::addIcon($params) . __($params['label'], array(), 'sf_admin').'</button></li>';
  }

  public function linkToSaveAndAdd($object, $params)
  {
    $params['ui-icon'] = $this->getIcon('saveAndAdd', $params);

    if (!$object->isNew())
    {
      return '';
    }

    return '<li class="sf_admin_action_save_and_add"><button type="submit" name="_save_and_add" class="fg-button ui-state-default fg-button-icon-left"/>'. UIHelper::addIcon($params) . __($params['label'], array(), 'sf_admin').'</button></li>';
  }

  public function getUrlForAction($action)
  {
    return 'list' == $action ? '<?php echo $this->params['route_prefix'] ?>' : '<?php echo $this->params['route_prefix'] ?>_'.$action;
  }

  protected function getIcon($type, $params)
  {
    return empty($params['ui-icon']) ? UIHelper::getIcon($type) : $params['ui-icon'];
  }
}
