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
	public function linkToShow($object, $params)
  {
    return '<li class="sf_admin_action_show">'.link_to(__($params['label'], array(), 'sf_admin'). UIHelper::addIcon($params), $this->getUrlForAction('show'), $object, $params['params']).'</li>';
  }
  
  public function linkToNew($params)
  {
    return '<li class="sf_admin_action_new">'.link_to(__($params['label'] , array(), 'sf_admin') . UIHelper::addIcon($params), '@'.$this->getUrlForAction('new'),$params['params']).'</li>';
  }

  public function linkToEdit($object, $params)
  {
    return '<li class="sf_admin_action_edit">'.link_to(__($params['label'], array(), 'sf_admin') . UIHelper::addIcon($params), $this->getUrlForAction('edit'), $object, $params['params']).'</li>';
  }

  public function linkToDelete($object, $params)
  {
    if ($object->isNew())
    {
      return '';
    }
    return '<li class="sf_admin_action_delete">'.link_to( __($params['label'], array(), 'sf_admin') . UIHelper::addIcon($params), $this->getUrlForAction('delete'), $object, array('class' => UIHelper::getClasses($params['params']),'method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])).'</li>';
  }

  public function linkToList($params)
  {
    return '<li class="sf_admin_action_list">'.link_to(__($params['label'], array(), 'sf_admin') . UIHelper::addIcon($params), '@'.$this->getUrlForAction('list'),$params['params']).'</li>';
  }

  public function linkToSave($object, $params)
  {
    return '<li class="sf_admin_action_save"><button type="submit" class="sf_button ui-state-default ui-priority-primary ui-corner-all">'. UIHelper::addIcon($params) . __($params['label'], array(), 'sf_admin').'</button></li>';
  }

  public function linkToSaveAndAdd($object, $params)
  {
    if (!$object->isNew())
    {
      return '';
    }

    return '<li class="sf_admin_action_save_and_add"><button type="submit" name="_save_and_add" class="sf_button sf_button-icon-right ui-state-default ui-priority-secondary ui-corner-all"/>'. UIHelper::addIcon($params) . __($params['label'], array(), 'sf_admin').'</button></li>';
  }

  public function getUrlForAction($action)
  {
    return 'list' == $action ? '<?php echo $this->params['route_prefix'] ?>' : '<?php echo $this->params['route_prefix'] ?>_'.$action;
  }
}
