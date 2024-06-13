<?php 
if($show_html_ultra_view == "1") {
	if ($decor_status != "1"){ 
		echo "<div>";
		if($heading_title) { 
			echo "";
		}
		if ($php_on=="on"){
			eval('?>' .$html_ultra); 
		}else{
			echo $html_ultra;
		}
		echo "</div>";
	} else {
		if ($php_on=="on"){
				eval('?>' .$html_ultra); 
			}else{
				echo $html_ultra;
			}
		if (!empty($html_ultra_css)){
		echo '<style type="text/css">';
		echo $html_ultra_css;
		echo '</style>';			
		}

	}
}

?>