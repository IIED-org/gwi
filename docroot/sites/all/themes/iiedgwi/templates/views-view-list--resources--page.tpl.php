<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
?>
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



$total = 0;
$url      = $_SERVER['REQUEST_URI'];
$lan = substr($url, 1, 2);



//print_nice($view->result);

?>
<?php print $wrapper_prefix; ?>
  <?php if (!empty($title)) : ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>
  
  <script type="text/javascript">
  
  	var inner = [];
	jQuery('.precise-list li').each( function(index, Element){
	    if (jQuery.inArray(this.innerHTML, inner) == -1){
	      inner.push(this.innerHTML);
	    }
	    else {
	      jQuery(this).remove();
	    }
	});
  
  </script>
  <ul class="precise-list">
<?php 	$values = array(); ?>
<?php foreach ($rows as $id => $row): ?>
<?php
	
	$value = $view->result[$id]->field_field_precis_download['0']['raw']['value'];
	$lankey = key($view->result[$id]->field_field_precis_download['0']['rendered']['entity']['field_collection_item'][$value]['#entity']->field_document_title);	
	
	if(in_array($value, $values)){
	
			//do nothing
	
	}else{
		
		array_push($values, $value);
	
		if($lankey != $lan){
	
			// don nothing
		
		}else{
			
			$doc_title = $view->result[$id]->field_field_precis_download['0']['rendered']['entity']['field_collection_item'][$value]['#entity']->field_document_title[$lan]['0']['value'];
			$doc_date = $view->result[$id]->field_field_precis_download['0']['rendered']['entity']['field_collection_item'][$value]['#entity']->field_document_date[$lan]['0']['value'];
			$doc_type = $view->result[$id]->field_field_precis_download['0']['rendered']['entity']['field_collection_item'][$value]['#entity']->field_type_of_resource_[$lan]['0']['value'];
			$doc_lang = $view->result[$id]->field_field_precis_download['0']['rendered']['entity']['field_collection_item'][$value]['#entity']->field_language_of_original_docum[$lan]['0']['value'];
			$doc_size = $view->result[$id]->field_field_precis_download['0']['rendered']['entity']['field_collection_item'][$value]['#entity']->field_document_download[$lan]['0']['filesize'];
			$doc_download_fid = $view->result[$id]->field_field_precis_download['0']['rendered']['entity']['field_collection_item'][$value]['#entity']->field_document_download[$lan]['0']['fid'];
			$doc_summary = $view->result[$id]->field_field_precis_download['0']['rendered']['entity']['field_collection_item'][$value]['#entity']->field_document_summary[$lan]['0']['value'];
			
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
			
			print $text;

		} 
	}
		
?>
<?php endforeach; ?>

</ul>
<?php print $wrapper_suffix; ?>