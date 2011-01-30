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
    $params = $this->addClass('show', $params);
    return '<li class="sf_admin_action_show">'.link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('show'), $object, $params['params']).'</li>';
  }

  public function linkToNew($params)
  {
    $params = $this->addClass('new', $params);
    return '<li class="sf_admin_action_new">'.link_to(__($params['label'] , array(), 'sf_admin'), '@'.$this->getUrlForAction('new'), $params['params']).'</li>';
  }

  public function linkToEdit($object, $params)
  {
    $params = $this->addClass('edit', $params);
    return '<li class="sf_admin_action_edit">'.link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('edit'), $object, $params['params']).'</li>';
  }

  public function linkToDelete($object, $params)
  {
    if ($object->isNew())
    {
      return '';
    }

    $params = $this->addClass('delete', $params, ' ui-priority-secondary');
    return '<li class="sf_admin_action_delete">'.link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('class' => UIHelper::getClasses($params['params']),'method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])).'</li>';
  }

  public function linkToList($params)
  {
    $params = $this->addClass('list', $params);
    return '<li class="sf_admin_action_list">'.link_to(__($params['label'], array(), 'sf_admin'), '@'.$this->getUrlForAction('list'),$params['params']).'</li>';
  }

  public function linkToSave($object, $params)
  {
    $params = $this->addClass('save', $params);
    return '<li class="sf_admin_action_save"><button type="submit" class="'. UIHelper::getClasses($params['params']) . '">'. __($params['label'], array(), 'sf_admin').'</button></li>';
  }

  public function linkToSaveAndAdd($object, $params)
  {
    if (!$object->isNew())
    {
      return '';
    }
    $params = $this->addClass('saveAndAdd', $params);
    return '<li class="sf_admin_action_save_and_add"><button type="submit" name="_save_and_add" class="'. UIHelper::getClasses($params['params']) . '">'. UIHelper::addIcon($params) . __($params['label'], array(), 'sf_admin').'</button></li>';
  }

  public function getUrlForAction($action)
  {
    return 'list' == $action ? '<?php echo $this->params['route_prefix'] ?>' : '<?php echo $this->params['route_prefix'] ?>_'.$action;
  }

  protected function getIcon($type, $params)
  {
    return empty($params['ui-icon']) ? UIHelper::getIcon($type) : $params['ui-icon'];
  }
  
  protected function addClass($type, $params, $extra = '')
  {
    $icon = $this->getIcon($type, $params);
    if($icon)
    {
      $icon = ' ui-icon-' . $icon;
    }
    $params['params'] = UIHelper::arrayToString(array('class' => UIHelper::getClasses($params['params']).$icon.' '.$extra));

    return $params;
  }
}
