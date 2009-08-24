<div class="sf_admin_pagination" id="sf_admin_pager">
	[?php
	$first = ($pager->getPage() * $pager->getMaxPerPage() - $pager->getMaxPerPage() + 1);
	$last = $first + $pager->getMaxPerPage() - 1;
	?]
	[?php
	echo __('%1% - %2% of %3%',
		array(
			'%1%' => $first,
			'%2%' => ($last > $pager->getNbResults())?$pager->getNbResults():$last,
			'%3%' => $pager->getNbResults()
		)
	);
	?]
	[?php if ($pager->haveToPaginate()): ?]
		| [?php echo link_to_if($pager->getPage() > 1,__('First'),'@<?php echo $this->getUrlForAction('list')?>?page=1') ?]
		| [?php echo link_to_if($pager->getPage() > 1,__('Prev'),'@<?php echo $this->getUrlForAction('list')?>?page='.$pager->getPreviousPage()) ?]
		| [?php echo link_to_if($pager->getPage() < $pager->getLastPage(),__('Next'),'@<?php echo $this->getUrlForAction('list')?>?page='.$pager->getNextPage()) ?]
		| [?php echo link_to_if($pager->getPage() < $pager->getLastPage(),__('Last'),'@<?php echo $this->getUrlForAction('list')?>?page='.$pager->getLastPage()) ?]
 	[?php endif; ?]
</div>
<!--div class="sf_admin_pagination">
  <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=1">
    [?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/first.png', array('alt' => __('First page', array(), 'sf_admin'), 'title' => __('First page', array(), 'sf_admin'))) ?]
  </a>

  <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getPreviousPage() ?]">
    [?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/previous.png', array('alt' => __('Previous page', array(), 'sf_admin'), 'title' => __('Previous page', array(), 'sf_admin'))) ?]
  </a>

  [?php foreach ($pager->getLinks() as $page): ?]
    [?php if ($page == $pager->getPage()): ?]
      [?php echo $page ?]
    [?php else: ?]
      <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $page ?]">[?php echo $page ?]</a>
    [?php endif; ?]
  [?php endforeach; ?]

  <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getNextPage() ?]">
    [?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/next.png', array('alt' => __('Next page', array(), 'sf_admin'), 'title' => __('Next page', array(), 'sf_admin'))) ?]
  </a>

  <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getLastPage() ?]">
    [?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/last.png', array('alt' => __('Last page', array(), 'sf_admin'), 'title' => __('Last page', array(), 'sf_admin'))) ?]
  </a>
</div-->
