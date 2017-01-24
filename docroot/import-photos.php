<?php



	//path to directory to scan
	$directory = "sites/default/files/shortlisted_photos/";
		
	//echo $directory;
	 
	//get all image files with a .jpg extension.
	$images = glob($directory . "*");
	 
	//print each file name
	

	
?>
<?php
	echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<rss xmlns:media="http://search.yahoo.com/mrss/" xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">  
  <channel> 
    <title>GWI - images</title>  
    <description></description>  
    <language>en-gb</language>  
    <lastBuildDate></lastBuildDate>  
    <copyright></copyright>  
    <ttl>15</ttl>  
    <?php
    	foreach($images as $id => $image)
	{
		$content = '';
		$content .= '<item>';
		$content .= '<title>'.str_replace($directory, '', $image).'</title>';
		$content .= '<description>http://iiedgwi.4alldigital.com/'.$image.'</description>';
		$content .= '</item>';
		print $content;		
		
	}
	
	?>
   </channel> 
</rss>