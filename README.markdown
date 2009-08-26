# sfAdminThemejRoller plugin

## Overview
The `sfAdminThemejRollerPlugin` packages a new admin generator theme based on jQuery UI ThemeRoller (http://jqueryui.com/themeroller/).

This plugin allows to change the default admin generator theme to one based on the theme roller from jQuery UI team. 
It is very convenient to change themes and keep UI consistency all around or even create your own theme. This admin generator theme
is only targeting the actual element of the admin generator (table, forms...), it does not modify your overall layout.

Here are some screenshots: [Table list and themes](http://lh5.ggpht.com/_HlYBk55Czxc/SovPBjZPmsI/AAAAAAAAAyw/sp28Wi_hFCw/jroller-list-themes.png?imgmax=800) | [Filters and action menu](http://lh6.ggpht.com/_HlYBk55Czxc/SpIBG_3Mw4I/AAAAAAAAAy8/6YlRs4ciikM/jroller-list-filters.png?imgmax=800) | [Form](http://lh4.ggpht.com/_HlYBk55Czxc/SpICgt-bCwI/AAAAAAAAAzI/m107vadkdJg/jroller-form.png?imgmax=800)

This theme is working with Doctrine ORM but it should be very easy to adapt for Propel: inside the plugin rename the folder 'sfDoctrineModule' into 'sfPropelModule' and you should be ready to go.

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

You can use your own jQuery/jQueryUI and your own theme (based on ThemeRoller) and configure all this inside your *app.yml*:

		sf_admin_theme_jroller_plugin:
	  	web_dir:      /sfAdminThemejRollerPlugin # specify your folder where to pick jquery stuff, ui and themes.
	    use_jquery:   true # default. use the packaged jquery/UI
	    theme:        redmond # default. 
	    css_reset:    true # default. reset default css (from Blueprint CSS)


To add icons on your buttons/links you can use those proposed by ThemeRoller and include them in your generator.yml:

		actions:
			_new: { ui-icon: plus }
		object_actions:
			_edit: { ui-icon: pencil }

Note: you only need to use the specific part of each icon name, not the all name, e.g. for 'ui-icon-plus' you only type 'plus'.

## Links

* [jQuery library](http://jquery.com/)
* [jQuery UI](http://jqueryui.com/)
* [jQuery UI ThemeRoller](http://jqueryui.com/themeroller/)

## Changelog

* version 0.1.2: remove depreciated sfLoader inside UIHelper class. Add README.markdown.
* version 0.1.1: README file fix and more documentation. Add [github repository](http://github.com/gestadieu/sfAdminThemejRollerPlugin/).
* version 0.1.0: initial release

## TODO

* fix bugs (no kidding ;-)
* clean up css
* add new features: show view, print view, export and , live search
* get svn repositories for your great contributions
* setup a live demo
* rule the world, do good not evil
