<?php

class UIHelper 
{
  /**
   * Adds UI CSS classes
   *
   * @param array $params An array of parameters
   * @param string $extra Extra CSS classes
   * @return string
   * @static
   */
	static public function addClasses(array $params, $extra = '')
	{
		$iconClass = (isset($params['ui-icon'])) ?' sf_button-icon-left ' : '';
		$uiClasses = sprintf(' %s sf_button %s ui-corner-all', $extra, $iconClass);
		$uiParams  = is_array($params['params']) ? $params['params'] : sfToolkit::stringToArray($params['params']);
		$uiParams['class'] = $uiClasses;

		return self::arrayToString($uiParams);
	}

  /**
   * Returns the CSS classes to apply as a string
   *
   * @param string $params
   * @return string
   * @static
   */
	static public function getClasses($params)
	{
		$table = sfToolkit::stringToArray($params);

		return $table['class'];
	}

  /**
   * Adds an UI icon
   *
   * @param array $params An array of parameters
   * @return string
   * @static
   */
	static public function addIcon(array $params)
	{
		if (!empty($params['ui-icon']))
		{
			return sprintf('<span class="ui-icon ui-icon-%s"></span>', $params['ui-icon']);
		}
	}

  /**
   * Converts an associative array to a string
   *
   * @param array $params The associative array
   * @return string
   * @static
   */
	static public function arrayToString(array $params)
	{
	  $result = '';
	  foreach ($params as $key => $value)
	  {
	    $result .= sprintf('%s=%s ', $key, $value);
	  }

    return $result;
	}
}