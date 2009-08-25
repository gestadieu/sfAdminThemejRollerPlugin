<?php
class UIHelper 
{
	public static function addClasses($params,$extra = null)
	{
		$icon_class =  (isset($params['ui-icon']))?' sf_button-icon-left ':'';
		$UIClasses = ' ' .$extra .' sf_button ' . $icon_class . ' ui-corner-all ';
		$uparams = is_array($params['params']) ? $params['params'] : sfToolkit::stringToArray($params['params']);
    if (isset($uparams['class']))
		{
			$uparams['class'] .= $UIClasses;
		}
		else
		{
			$uparams['class'] = $UIClasses;
		}
		return self::arrayToString($uparams);
	}
	
	public static function getClasses($params)
	{
		$table = sfToolkit::stringToArray($params);
		return $table['class'];
	}
	
	public static function addIcon($params)
	{
		if (isset($params['ui-icon']) && $params['ui-icon'] != '')
		{
			return '<span class="ui-icon ui-icon-'.$params['ui-icon'].'"></span>';
		}
	}
	
	public static function arrayToString($params)
	{
		$tp = '';
		
		foreach ($params as $key => $val)
		{
			$tp .= "$key=$val ";
		}
		return $tp;
	}
	
}