[?php include_stylesheets_for_form($form) ?]
[?php include_javascripts_for_form($form) ?]

<div class="sf_admin_form">
	[?php 
	$count = 0;
	foreach ($configuration->getFormFields($form, 'show') as $fieldset => $fields): 
		$count++;
	endforeach; 
	?]

	<div id="sf_admin_form_tab_menu">
		[?php if ($count > 1): ?]
		<ul>
    [?php foreach ($configuration->getFormFields($form,'show') as $fieldset => $fields): ?]
			[?php $count++ ?]
			<li><a href="#sf_fieldset_[?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?]">[?php echo __($fieldset, array(), '<?php echo $this->getI18nCatalogue() ?>') ?]</a></li>
    [?php endforeach; ?]
		</ul>
		[?php endif ?]
	
    [?php foreach ($configuration->getFormFields($form, 'show') as $fieldset => $fields): ?]
      [?php //include_partial('<?php echo $this->getModuleName() ?>/form_fieldset', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?]

		<div id="sf_fieldset_[?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?]">
		
				[?php foreach ($fields as $name => $field): ?]
		    [?php $attributes = $field->getConfig('attributes', array()); ?]
			[?php if ($field->isPartial()): ?]
		      [?php include_partial('<?php echo $this->getModuleName() ?>/'.$name, array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
		    [?php elseif ($field->isComponent()): ?]
		      [?php include_component('<?php echo $this->getModuleName() ?>', $name, array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
		    [?php else: ?]
		    <div class="sf_admin_form_row">
		      <label>[?php echo $field->getConfig('label')? $field->getConfig('label'): $field->getName() ?]:</label>
			    [?php echo $form->getObject()->get($name) ? $form->getObject()->get($name) : "&nbsp;" ?]
		    </div>
		    [?php endif; ?]

		  [?php endforeach; ?]
		</div>
    [?php endforeach; ?]
	</div>
</div>
