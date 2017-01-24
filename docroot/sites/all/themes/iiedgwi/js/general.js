jQuery(document).ready(function(){


if(jQuery('body').hasClass('page-where-we-work') && jQuery('body').hasClass('i18n-fr')){

	jQuery('image').click(function(){
	
		//setTimeout( fixURL() ,3000);
		setTimeout(function(){fixURL()},500);

	})
	
	function fixURL(){
		var country_url = jQuery('#popup_contentDiv > div a').attr('href').replace("/en/", "/fr/");;
		jQuery('#popup_contentDiv > div a').attr('href', country_url);
	}



}

//jQuery('#superfish-1 > li > ul').wrap('<div class="menu-shadow"></div>');
jQuery('.blue-banner').click(function(){
	jQuery(this).toggleClass('show');
	jQuery(this).siblings().toggleClass('show');
})


jQuery('#header-links div#menu').click(function(){

		jQuery('#block-superfish-1').toggleClass('showmenu');
		jQuery(this).toggleClass('on');
		//jQuery('#wrapper').toggleClass('fixed');
		
	});
	
	jQuery('#header-links div#menu').toggle(
		   function()
		   	{
			   	jQuery('#block-superfish-1').animate({left: "0"}, 500);
			},
			function()
			{
				jQuery('#block-superfish-1').animate({left: "-240"}, 500);
	});
	
	jQuery('#quicktabs-themes_topics .item-list li a').each(function(){
		var thistitle = jQuery(this).html();
		jQuery(this).attr('title', thistitle);
	})
	
})