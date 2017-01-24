<div<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>
    <?php if ($main_menu || $secondary_menu): ?>
    
     <div id="menu-wrapper">

     <div id="main-nav">
		<div id="nav-shadow"></div>
    
	    <nav class="navigation">
	      <?php //print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix', 'main-menu')), 'heading' => array('text' => t('Main menu'),'level' => 'h2','class' => array('element-invisible')))); ?>
	      <?php //print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('links', 'inline', 'clearfix', 'secondary-menu')), 'heading' => array('text' => t('Secondary menu'),'level' => 'h2','class' => array('element-invisible')))); ?>
	    </nav>    
     </div> <!-- close main-nav -->
     
    <?php endif; ?>
    <?php print $content; ?>
  </div>
</div>
