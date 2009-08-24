<div class="sf_admin_flashes">
[?php if ($sf_user->hasFlash('notice')): ?]
  <div class="ui-widget"><div class="notice ui-state-highlight ui-corner-all">[?php echo __($sf_user->getFlash('notice'), array(), 'sf_admin') ?]</div></div>
[?php endif; ?]

[?php if ($sf_user->hasFlash('error')): ?]
  <div class="ui-widget"><div class="error ui-state-error ui-corner-all">[?php echo __($sf_user->getFlash('error'), array(), 'sf_admin') ?]</div></div>
[?php endif; ?]
</div>