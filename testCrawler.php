<body style="overflow: scroll;white-space: nowrap;">
<?
function find_and_combine_css($url){
	if(substr($url, -1) != '/'){
		$url .= '/';
	}
	$urlFile = file_get_contents($url);

	$chunks = array();
	$regex = '#<link>?.+href=["|\'].+["|\']?.+</link>#';
	$regex = '%<link .+[^>]%';
	preg_match_all($regex, $urlFile, $chunks);

	$cssArray = array();

	foreach($chunks[0] as $key => $value){
		$array = array();
		$regex = '%href=".+"%';
		preg_match($regex, $value, $array);

		foreach($array as $key2 => $value2){
			$string = str_replace('href="', '', $value2);
			$regex = '%".+"%';
			$string = preg_replace($regex, '', $string);
			$string = str_replace('"', "", $string);
			if(!preg_match_all('%css%', $string)) continue;
			if(substr($string, 0,1) == '/') $string = substr($string, 1);
			echo $string.'<br>';
			if(substr($string, 0, 2) == '//'){
				$cssArray[] = 'http:'.$string;
			}
			else if(substr($string, 0,4) == 'http'){
				$cssArray[] = $string;
			}
			else{
				$cssArray[] = $url.$string;
			}
		}
	}

	$masterCss = '';

	echo "<br><hr><br>";

	foreach($cssArray as $key => $value){
// 		$masterCss .= file_get_contents($value);
		echo $value.'<br>';
	}

	return $masterCss;
}


	$url = 'http://wisdom.com/';
	echo find_and_combine_css($url);
