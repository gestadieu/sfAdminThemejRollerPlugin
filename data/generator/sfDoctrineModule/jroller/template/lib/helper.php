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



	public function addUIIcon($params)
	{
		if (isset($params['ui-icon']) && $params['ui-icon'] != '')
		{
			return content_tag('span','','class=ui-icon ui-icon-'.$params['ui-icon']);
		}
	}
	
	public function addUIParams($params)
	{
		$UIClasses = ' sf_button sf_button-icon-left ui-state-default ui-priority-secondary ui-corner-all '; 
		$uparams = is_array($params['params']) ? $params['params'] : sfToolkit::stringToArray($params['params']);
    if (isset($uparams['class']))
		{
			$uparams['class'] .= $UIClasses;
		}
		else
		{
			$uparams['class'] = $UIClasses;
		}
		// var_dump($uparams);
		// $params['params'] = $uparams;
		$tp = '';
		foreach ($uparams as $key => $val)
		{
			$tp .= "$key=$val ";
		}
		return $tp;
		return $params;
	}

	public function addUIClasses($user_params, $local = null)
	{
		$UIClasses = ' sf_button sf_button-icon-left ui-state-default ui-priority-secondary ui-corner-all ' . $local; 

    $user_params = is_array($user_params) ? $user_params : sfToolkit::stringToArray($user_params);
		return (isset($user_params['class'])) ? $user_params['class'] . $UIClasses : $UIClasses;
	}
	public function addUI($params, $options = null)
	{
		$UIClasses = ' sf_button sf_button-icon-left ui-state-default ui-priority-secondary ui-corner-all ' . $options; 

    $user_params = is_array($params) ? $params : sfToolkit::stringToArray($params);
		return (isset($user_params['class'])) ? $user_params['class'] . $UIClasses : $UIClasses;
	}

}
