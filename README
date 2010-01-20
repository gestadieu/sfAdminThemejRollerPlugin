# sfAdminThemejRoller plugin

## Overview
The `sfAdminThemejRollerPlugin` packages a new admin generator theme based on jQuery UI ThemeRoller (http://jqueryui.com/themeroller/).

This plugin allows to change the default admin generator theme to one based on the theme roller from jQuery UI team. 
It is very convenient to change themes and keep UI consistency all around or even create your own theme. This admin generator theme
is only targeting the actual element of the admin generator (table, forms...), it does not modify your overall layout.

Here are some screenshots: [Table list and themes](http://lh5.ggpht.com/_HlYBk55Czxc/S1chcjbDuyI/AAAAAAAAA5E/SKG07o2hG1s/s720/jroller-v0.2-list.png) | [Filters and action menu](http://lh4.ggpht.com/_HlYBk55Czxc/S1chUnKe6iI/AAAAAAAAA5A/GVyDhrrQSWM/jroller-v0.2-filter.png) | [Form](http://lh4.ggpht.com/_HlYBk55Czxc/SpICgt-bCwI/AAAAAAAAAzI/m107vadkdJg/jroller-form.png?imgmax=800)

## Installation

1.Download and install the plugin

		./symfony plugin:install sfAdminThemejRollerPlugin --stability=beta

2.Clear the cache

		./symfony cc

3.Publish the plugin's assets:

		./symfony plugin:publish-assets


## How to use it

Generate an admin generator:

		./symfony --theme=jroller doctrine:generate-admin

**OR** if you already have an admin generator, you can simply change the theme inside your generator.yml

		theme: jroller

In any case don't forget the traditional:

		./symfony cc

That's it! You are ready to use your new admin generator face.

## Configuration

### 1. jQuery related configuration

You can use your own jQuery/jQueryUI and your own theme (based on ThemeRoller) and configure all this inside your *app.yml*:

	sf_admin_theme_jroller_plugin:
		web_dir:      /sfAdminThemejRollerPlugin # specify your folder where to pick jquery and jquery UI.
		use_jquery:   true # default. use the packaged jquery/UI
		theme_dir:		/sfAdminThemejRollerPlugin # default. change the theme directory
		theme:        redmond # default. 
		css_reset:    true # default. reset default css (from Blueprint CSS)

Note:

* web_dir and use_jquery are usually working together, you will modify them if you want to use your own jQuery/UI files.
* theme_dir and theme are working together. You modify them when you want to use another theme from the default one (redmond). Your theme file should be inside {theme_dir}/{theme}/ with the name 'jquery-ui.custom.css'

To add icons on your buttons/links you can use those proposed by ThemeRoller and include them in your generator.yml:

	actions:
		_new: { ui-icon: plus }
	object_actions:
		_edit: { ui-icon: pencil }

Note: you only need to use the specific part of each icon name, not the all name, e.g. for 'ui-icon-plus' you only type 'plus'.

### 2. Extra features configuration

This plugin add as well some new features. Currently available:

* 'extra': a parameter to switch on/off one by one all new features.
* 'show': add a show view, similar to the 'edit' view but no editable values only plain text is display.

#### 2.1 Extra parameter

	param:
		theme:		jroller
		extra:		[show, print, export]
	
Note: currently only the show extra feature is available.

#### 2.2 Show view

In your generator.yml file you can now add at the same level of 'list', 'edit' and so on, the following:

	config:
		list: ~
		show:
			title: ...
			display: ...
			actions: ...


## Links

* [jQuery library](http://jquery.com/)
* [jQuery UI](http://jqueryui.com/)
* [jQuery UI ThemeRoller](http://jqueryui.com/themeroller/)
* [ThemeRoller buttons](http://www.filamentgroup.com/lab/jquery_ipod_style_and_flyout_menus/)

## Changelog

* version 0.2.0: fix minor issues for compatibility with symfony 1.3 and 1.4. Live demo available at (http://symfony-planet.com/user)
* version 0.1.4: add a 'show' view parameter for generator.yml. Default on link (when you specify =yourfield). It can also be added as a button on the object action list. To use this you must use the new jRollerDoctrineGenerator class in your generator.yml file instead of the default sfDoctrineGenerator.
* version 0.1.3: THIS VERSION BRAKES PREVIOUS app.yml config. Modify the app.yml to make it more in line with "standard" plugins and add one new parameter: theme_dir to easily set external theme without changing jquery. Remove 2 themes to keep only one in the plugin (add your own in your web folder).
* version 0.1.2: remove depreciated sfLoader inside UIHelper class. Add README.markdown.
* version 0.1.1: README file fix and more documentation. Add [github repository](http://github.com/gestadieu/sfAdminThemejRollerPlugin/).
* version 0.1.0: initial release

## TODO

* fix bugs (no kidding ;-)
* clean up css
* add new features: print view, export and , live search
* rule the world, do good not evil
