<?php
function print_nice($elem,$max_level=10,$print_nice_stack=array()){ 
    if(is_array($elem) || is_object($elem)){ 
        if(in_array(&$elem,$print_nice_stack,true)){ 
            echo "<font color=red>RECURSION</font>"; 
            return; 
        } 
        $print_nice_stack[]=&$elem; 
        if($max_level<1){ 
            echo "<font color=red>nivel maximo alcanzado</font>"; 
            return; 
        } 
        $max_level--; 
        echo "<table border=1 cellspacing=0 cellpadding=3 width=100%>"; 
        if(is_array($elem)){ 
            echo '<tr><td colspan=2 style="background-color:#333333;"><strong><font color=white>ARRAY</font></strong></td></tr>'; 
        }else{ 
            echo '<tr><td colspan=2 style="background-color:#333333;"><strong>'; 
            echo '<font color=white>OBJECT Type: '.get_class($elem).'</font></strong></td></tr>'; 
        } 
        $color=0; 
        foreach($elem as $k => $v){ 
            if($max_level%2){ 
                $rgb=($color++%2)?"#888888":"#BBBBBB"; 
            }else{ 
                $rgb=($color++%2)?"#8888BB":"#BBBBFF"; 
            } 
            echo '<tr><td valign="top" style="width:40px;background-color:'.$rgb.';">'; 
            echo '<strong>'.$k."</strong></td><td>"; 
            print_nice($v,$max_level,$print_nice_stack); 
            echo "</td></tr>"; 
        } 
        echo "</table>"; 
        return; 
    } 
    if($elem === null){ 
        echo "<font color=green>NULL</font>"; 
    }elseif($elem === 0){ 
        echo "0"; 
    }elseif($elem === true){ 
        echo "<font color=green>TRUE</font>"; 
    }elseif($elem === false){ 
        echo "<font color=green>FALSE</font>"; 
    }elseif($elem === ""){ 
        echo "<font color=green>EMPTY STRING</font>"; 
    }else{ 
        echo str_replace("\n","<strong><font color=red>*</font></strong><br>\n",$elem); 
    } 
} 

//print_nice($node);

//print_nice($content['field_precis_download']['0']['entity']['field_collection_item']);
				//die();

?><article<?php print $attributes; ?>>
  <?php print $user_picture; ?>
  <?php print render($title_prefix); ?>
  <?php if (!$page && $title): ?>
  <header>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
  </header>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($display_submitted): ?>
  <footer class="submitted"><?php print $date; ?> -- <?php print $name; ?></footer>
  <?php endif; ?>  
  
  <div<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>    
    <?php
		$lan = '';
		
		if($node->language == 'en'){
			$lan = 'en';
		}elseif($node->language == 'fr'){
			$lan = 'fr';			
		}else{
			$lan = 'und';
		}
		
    	if($content['field_precis_download']){
    	
	    	$doc_precis = $content['field_precis_download'];
			
			echo '<ul class="precise-list">';
			
			for ($i = 0; $i <= 2000; $i++){
			
				if($content['field_precis_download'][$i]){	
				
				
				$array = $content['field_precis_download'][$i]['entity']['field_collection_item'];
				//print_nice($array, 1);
				//die();
				$ii = key($array);	
				
				//print $ii;
										
				//while (!array_key_exists($ii,$array )){	
				//	echo ;
				//	$ii = 3; 
				//}
				
				//echo $ii;

				//$ii = $ii +$i; 
			//	echo '<pre>';
				
			//	echo '</pre>';
			//	die();
			
			
					
					$doc_title = $content['field_precis_download'][$i]['entity']['field_collection_item'][$ii]['field_document_title']['#object']->field_document_title[$lan]['0']['value'];
					$doc_date = $content['field_precis_download'][$i]['entity']['field_collection_item'][$ii]['field_document_date']['#object']->field_document_date[$lan]['0']['value'];
					$doc_type = $content['field_precis_download'][$i]['entity']['field_collection_item'][$ii]['field_type_of_resource_']['#object']->field_type_of_resource_[$lan]['0']['value'];
					$doc_lang = $content['field_precis_download'][$i]['entity']['field_collection_item'][$ii]['field_language_of_original_docum']['#object']->field_language_of_original_docum[$lan]['0']['value'];
					$doc_size = $content['field_precis_download'][$i]['entity']['field_collection_item'][$ii]['field_document_download']['#object']->field_document_download[$lan]['0']['filesize'];
					$doc_download_fid = $content['field_precis_download'][$i]['entity']['field_collection_item'][$ii]['field_document_download']['#object']->field_document_download[$lan]['0']['fid'];
					$doc_summary = $content['field_precis_download'][$i]['entity']['field_collection_item'][$ii]['field_document_summary']['#object']->field_document_summary[$lan]['0']['value'];
					
					$formatted_doc_date = new DateTime($doc_date);
							
					$text = "";
					$text .= '<li class="precis-doc">';
					$text .= '<div class="blue-banner">';
					$text .= '<div class="precis-title">'.$doc_title. ' <span class="doc-type"> <em> ('.str_replace('_', ' ', $doc_type).')</em></span></div>';
					$text .= '<div class="doc-date">'.$formatted_doc_date->format('M Y').'</div>';
					//$text .= '<div class="doc-type"><em>'.str_replace('_', ' ', $doc_type).'</em></div>';
					$text .= '<span class="precise-indicator"></span>';
					$text .= '</div><!-- close blue wrapper -->';
					$text .= '<div class="summary">';
					$text .= '<div class="doc-lang">Document language: '.$doc_lang.'</div>';
					$text .= '<div class="doc-size">Document size: '.round($doc_size/1000000, 2).'MB</p></div>';
					$text .= '<div class="doc-summary">'.$doc_summary.'</div>';
					$text .= '<div class="doc-download"><a href="/download/file/fid/'.$doc_download_fid.'">Download document</a></div>';
					$text .= '</div><!-- close summary -->';
					$text .= '</li><!-- close precis -->';
					
					//echo '<br>';
					
					print $text;
					//print $doc_title;
					//$content .= $doc_title;
			
				}else{
				
					break;
				
				}
			
			                               
			};   
	    
			echo '</ul>'; //close doc list 
		} // close if
    ?>

  </div>
  
  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <nav class="links node-links clearfix"><?php print render($content['links']); ?></nav>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>
</article>