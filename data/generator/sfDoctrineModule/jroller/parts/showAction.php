	public function executeShow(sfWebRequest $request)
	{
	  $this-><?php echo $this->getSingularName() ?> = Doctrine::getTable('<?php echo $this->getModelClass() ?>')->find(<?php echo $this->getRetrieveByPkParamsForAction(49) ?>);
	  $this->forward404Unless($this-><?php echo $this->getSingularName() ?>);
	  $this->form = $this->configuration->getForm($this-><?php echo $this->getSingularName() ?>);
	}
