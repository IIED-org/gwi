<?php print $doctype; ?>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf->version . $rdf->namespaces; ?>>
<head<?php print $rdf->profile; ?>>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>  
  <?php print $styles; ?>
  <?php print $scripts; ?>
  
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>  

<!-- For iPhone 4 with high-resolution Retina display: -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/sites/all/themes/iiedgwi/icons/iPhoneIcon_Big.png">
  <!-- For first-generation iPad: -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/sites/all/themes/iiedgwi/icons/iPhoneIcon_Medium.png">
  <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
  <link rel="apple-touch-icon-precomposed" href="/sites/all/themes/iiedgwi/icons/iPhoneIcon_Small.png">
  <!-- For nokia devices: -->
  
  <meta name="apple-mobile-web-app-capable" content="yes" />
  
  <!--[if IE 8]>
    <link rel="stylesheet" href="/sites/all/themes/iiedgwi/css/ie8.css" type="text/css" media="all"><![endif]-->
<!--[if IE 9]>
    <link rel="stylesheet" href="/sites/all/themes/iiedgwi/css/ie9.css" type="text/css" media="all"><![endif]-->

	
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body<?php print $attributes;?>>
<div id="topbar"></div>


    
    
    
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
 <div id="bottombar"></div>
</body>
</html>