<?php
d("src");
d("test");
d("docs");
//d("src/assets/styles");
function d($d){
	if(is_dir($d)){
		$l = array();
		exec("ls ".$d,$l);
		for($i=0;$i<count($l);$i++){
			if(is_dir($d.'/'.$l[$i])){
				d($d.'/'.$l[$i]);
			}else{
				ex($d.'/'.$l[$i]);
			}
		}
	}else{
		ex($d);
	}
}
function ex($path){
	$a1 = explode(".",$path) ;
	$a2 = array_reverse($a1);
//	if($a2[0] == "vue" or $a2[0] == "ts" or $a2[0] == "js"){
	if($a2[0] == "vue" or $a2[0] == "js"){
		$f = file_get_contents($path);

		if(substr_count($f,'this.$slots.default') > 0 && substr_count($f,'this.$slots.default()') == 0 ){
			//$e1 = explode('/deep/ ',$f);
			//for($i = 1;$i < count($e1);$i++){
			//	$e2 = explode(' ',$e1[$i]);
			//	$f = str_replace('/deep/ '.$e2[0],' :deep('.$e2[0].')',$f);
			//}
			$f = str_replace('this.$slots.default','this.$slots.default()',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}



		if(substr_count($f,'v-on="$listeners"') > 0 ){
			//$e1 = explode('/deep/ ',$f);
			//for($i = 1;$i < count($e1);$i++){
			//	$e2 = explode(' ',$e1[$i]);
			//	$f = str_replace('/deep/ '.$e2[0],' :deep('.$e2[0].')',$f);
			//}
			$f = str_replace('v-on="$listeners"',"",$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}


		if(substr_count($f,'events: this.$listeners') > 0 ){
			//$e1 = explode('/deep/ ',$f);
			//for($i = 1;$i < count($e1);$i++){
			//	$e2 = explode(' ',$e1[$i]);
			//	$f = str_replace('/deep/ '.$e2[0],' :deep('.$e2[0].')',$f);
			//}
			$f = str_replace('events: this.$listeners',"",$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}

		if(substr_count($f,'on: this.$listeners') > 0 ){
			//$e1 = explode('/deep/ ',$f);
			//for($i = 1;$i < count($e1);$i++){
			//	$e2 = explode(' ',$e1[$i]);
			//	$f = str_replace('/deep/ '.$e2[0],' :deep('.$e2[0].')',$f);
			//}
			$f = str_replace('on: this.$listeners',"",$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}
		if(substr_count($f,'click.native') > 0 ){
			//$e1 = explode('/deep/ ',$f);
			//for($i = 1;$i < count($e1);$i++){
			//	$e2 = explode(' ',$e1[$i]);
			//	$f = str_replace('/deep/ '.$e2[0],' :deep('.$e2[0].')',$f);
			//}
			$f = str_replace('click.native','click',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}



		if(substr_count($f,'keydown.native') > 0 ){
			//$e1 = explode('/deep/ ',$f);
			//for($i = 1;$i < count($e1);$i++){
			//	$e2 = explode(' ',$e1[$i]);
			//	$f = str_replace('/deep/ '.$e2[0],' :deep('.$e2[0].')',$f);
			//}
			$f = str_replace('keydown.native','keydown.enter',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}

		if(substr_count($f,'@focus.native') > 0 ){
			//$e1 = explode('/deep/ ',$f);
			//for($i = 1;$i < count($e1);$i++){
			//	$e2 = explode(' ',$e1[$i]);
			//	$f = str_replace('/deep/ '.$e2[0],' :deep('.$e2[0].')',$f);
			//}
			$f = str_replace('@focus.native','@focus',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}

		if(substr_count($f,'@focusout.native') > 0 ){
			//$e1 = explode('/deep/ ',$f);
			//for($i = 1;$i < count($e1);$i++){
			//	$e2 = explode(' ',$e1[$i]);
			//	$f = str_replace('/deep/ '.$e2[0],' :deep('.$e2[0].')',$f);
			//}
			$f = str_replace('@focusout.native','@focusout',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}


		if(substr_count($f,'@keydown.enter.native') > 0 ){
			//$e1 = explode('/deep/ ',$f);
			//for($i = 1;$i < count($e1);$i++){
			//	$e2 = explode(' ',$e1[$i]);
			//	$f = str_replace('/deep/ '.$e2[0],' :deep('.$e2[0].')',$f);
			//}
			$f = str_replace('@keydown.enter.native','@keydown.enter',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}


		if(substr_count($f,'slot="') > 0 ){
			$e1 = explode('slot="',$f);
			for($ix = 1;$ix < count($e1);$ix++){
				$e2 = explode('"',$e1[$ix]);
				$f = str_replace('slot="'.$e2[0].'"',' v-slot:'.$e2[0],$f);
			}

			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}


		if(substr_count($f,'href: [String, Number],') > 0 ){

			$f = str_replace('href: [String, Number],','href: {type: [String, Number],default: () => ""},',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}
		if(substr_count($f,'mdLabel: [String, Number],') > 0 ){

			$f = str_replace('mdLabel: [String, Number],','mdLabel: {type: [String, Number],default: () => ""},',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}

		if(substr_count($f,'mdIcon: String') > 0 ){

			$f = str_replace('mdIcon: String','mdIcon: {type: String, default: () => ""}',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}

		if(substr_count($f,'mdIndex: [String, Number]') > 0 ){

			$f = str_replace('mdIndex: [String, Number]','mdIndex: {type: [String, Number],default: () => ""}',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}

		if(substr_count($f,'mdId: [String, Number]') > 0 ){

			$f = str_replace('mdId: [String, Number]','mdId: {type: [String, Number],default: () => ""}',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}
		if(substr_count($f,'mdItem: [Array, Object]') > 0 ){

			$f = str_replace('mdItem: [Array, Object]','mdItem: {type: [Array, Object],default: () => []}',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}


		if(substr_count($f,'mdId: [Number, String]') > 0 ){

			$f = str_replace('mdId: [Number, String]','mdId: {type: [Number, String],default: () => 0}',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}

		if(substr_count($f,'mdIndex: [Number, String]') > 0 ){

			$f = str_replace('mdIndex: [Number, String]','mdIndex: {type: [Number, String],default: () => 0}',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}

		if(substr_count($f,'mdSelectable: {') > 0 and  substr_count($f,'mdSelectable: { default:') == 0){

			$f = str_replace('mdSelectable: {','mdSelectable: { default: () => "",',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}
		if(substr_count($f,"inject: ['MdTable'],") > 0 and  substr_count($f,"inject: ['MdTable'],//") == 0){

			$f = str_replace("inject: ['MdTable'],","",$f);
			$f = str_replace('props: {',"inject: ['MdTable'],//"."\n".'props: {',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}

		if(substr_count($f,'$emit(') > 0 and  substr_count($f,"emits: [") == 0){

			$emits = array();
			$e1 = explode('$emit('."'",$f);
			for($i=1;$i < count($e1);$i++){
				$e2 = explode("'",$e1[$i]);
				$k = $e2[0];
				$k = str_replace("'","",$k);
				$k = str_replace('"',"",$k);
				$emits[$k] = $k;
			}
			$se = 'emits: [';
			$n = 0;
			foreach($emits as $k => $v){
				if($n == 0){
					$se .= "'".$k."'";
				}else{
					$se .= ",'".$k."'";
				}
				$n++;
			}
			$se .= '],'."\n";


			$f = str_replace("methods: {",$se."methods: {",$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}

		if(substr_count($f,"mdData: {") > 0 ){
			$e1 = explode('mdData: {',$f);
			$e2 = explode('}',$e1[1]);
			if(substr_count($e2[0],'type: [Array, Object]') > 0 and substr_count($e2[0],'default:') == 0){
				$moto = 'mdData: {'.$e2[0].'}';
				$dist = 'mdData: {default: () =>[],'.$e2[0].'}';
				$f = str_replace($moto,$dist,$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);

			}
		}
		if(substr_count($f,'id: [String, Number]') > 0 ){

			$f = str_replace('id: [String, Number]','id: {type: [String, Number],default: () => ""}',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}
		if(substr_count($f,'label: String') > 0 ){

			$f = str_replace('label: String','label: {type: String,default: () => ""}',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}

		if(substr_count($f,'tooltip: String') > 0 ){

			$f = str_replace('tooltip: String','tooltip: {type: String,default: () => ""}',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}

		if(substr_count($f,'sortBy: String') > 0 ){

			$f = str_replace('sortBy: String','sortBy: {type: String,default: () => ""}',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}

		if(substr_count($f,'mdRowId: [Number, String]') > 0 ){

			$f = str_replace('mdRowId: [Number, String]','mdRowId: {type: [Number, String],default: () => 0}',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}

		if(substr_count($f,'mdLabel: String') > 0 ){

			$f = str_replace('mdLabel: String','mdLabel: {type: String,default: () => ""}',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}

		if(substr_count($f,'mdTooltip: String') > 0 ){

			$f = str_replace('mdTooltip: String','mdTooltip: {type: String,default: () => ""}',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}

		if(substr_count($f,'mdSortBy: String') > 0 ){

			$f = str_replace('mdSortBy: String','mdSortBy: {type: String,default: () => ""}',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}
		if(substr_count($f,'value: [Array, Object]') > 0 ){

			$f = str_replace('value: [Array, Object]','value: {type: [Array, Object],default: () => []}',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}
		if(substr_count($f,'mdSort: String') > 0 ){

			$f = str_replace('mdSort: String','mdSort: {type: String,default: () => ""}',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}



		if(substr_count($f,"mdSelectedValue: {") > 0 ){
			$e1 = explode('mdSelectedValue: {',$f);
			$e2 = explode('}',$e1[1]);
			if(substr_count($e2[0],'type: [Array, Object]') > 0 and substr_count($e2[0],'default:') == 0){
				$moto = 'mdSelectedValue: {'.$e2[0].'}';
				$dist = 'mdSelectedValue: {default: () =>[],'.$e2[0].'}';
				$f = str_replace($moto,$dist,$f);
				$fo = fopen($path,"w");
				fwrite($fo,$f);
				fclose($fo);
				chmod($path,0777);

			}
		}


		if(substr_count($f,"provide () {") > 0 and  substr_count($f,"provide () {//") == 0){
			$e1 = explode('provide () {',$f);
			$e2 = explode('},',$e1[1]);
			$moto = "provide () {".$e2[0].'},';
			$f = str_replace($moto,"",$f);
			$f = str_replace('props: {',$moto."\n".'props: {',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}

		if(substr_count($f,'mdError: String') > 0 ){

			$f = str_replace('mdError: String','mdError: {type: String,default: () => ""}',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}
		if(substr_count($f,'mdDescription: String') > 0 ){

			$f = str_replace('mdDescription: String','mdDescription: {type: String,default: () => ""}',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}
		if(substr_count($f,'mdClasses: Array') > 0 ){

			$f = str_replace('mdClasses: Array','mdClasses: {type: Array,default: () => []}',$f);
			$fo = fopen($path,"w");
			fwrite($fo,$f);
			fclose($fo);
			chmod($path,0777);
		}

		if(substr_count($f,'<template functional>') > 0 ){
				$e1 = explode('<template functional>',$f);
				$e2 = explode('</template>',$e1[1]);
				$moto = $e2[0];
				$dist = $moto;
				$dist = str_replace('props.','$props.',$dist);

				$f = str_replace('<template functional>','<template>',$f);
				$f = str_replace($moto,$dist,$f);
				$fo = fopen($path,"w");
				fwrite($fo,$f);
				fclose($fo);
				chmod($path,0777);




		}
		if(substr_count($f,'...this.$listeners,') > 0 ){
				$f = str_replace('...this.$listeners,',"",$f);
				$fo = fopen($path,"w");
				fwrite($fo,$f);
				fclose($fo);
				chmod($path,0777);




		}



	}
}




?>
