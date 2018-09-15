<div class="c-detail-article__topik">
	<?php
	if ($row->KEYWORD) {
	?>
	Topik : 
	<?php
	$k = explode(",", $row->KEYWORD);
	if (count($k) > 1){
		for($i=0;$i<count($k);$i++){
			$url = str_replace(" ","-", trim($k[$i]));
			echo '<a href="'.base_url().'tag/'.$url.'">'.$k[$i].'</a>'; 
			if (($i+1) != count($k)){ echo ','; }
			
		}
	} else {
		echo '<a href="'.base_url().'tag/'.$row->KEYWORD.'">'.$row->KEYWORD.'</a>';
	}
	?>
	<?php
	}
	?>
</div>