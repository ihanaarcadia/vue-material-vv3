<?php
d("src");


function d($d){
	exec("ls ".$d,$l);
	for($i=0;$i<count($l);$i++){
		if(is_dir($d.'/'.$l[$i])){
			d($d.'/'.$l[$i]);
		}else{
			//if($l[$i] == "opeContents.ts"){
			//	echo $d.'/'.$l[$i]."<br>\n";
			//}

			$f = file($d.'/'.$l[$i]);
			$f = join("",$f);
			//$f = strtolower($f);
//echo $d.'/'.$l[$i]."\n";
			$e1 = explode(".",$l[$i]);
			$e2 = array_reverse($e1);
			if(mb_substr_count($f,'.native') > 0){
				echo $d.'/'.$l[$i]."\n";
			}
		}
	}
}
?>
