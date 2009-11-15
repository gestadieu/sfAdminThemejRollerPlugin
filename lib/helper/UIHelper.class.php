<?php

class UIHelper 
{
  /**
   * @var array $icons an array containing plugin icons configuration
   * @static
   */
  static protected $icons = null;

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
    $iconClass = (isset($params['ui-icon'])) ? 'fg-button-icon-left' : '';
    $uiClasses = sprintf('%s fg-button ui-state-default %s', $extra, $iconClass);
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
   * Adds an UI icon
   *
   * @param string $type Icon type
   * @return string
   * @static
   */
  static public function addIconByConf($type)
  {
    return self::addIcon(array('ui-icon' => self::getIcon($type)));
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

  /**
   * Adds an UI icon
   *
   * @param string $type Icon type
   * @return string
   * @static
   */
  static public function getIcon($type)
  {
    if (is_null(self::$icons))
    {
      self::$icons = sfConfig::get('app_sf_admin_theme_jroller_plugin_icons', array());
    }

    return array_key_exists($type, self::$icons) ? self::$icons[$type] : '';
  }
}
