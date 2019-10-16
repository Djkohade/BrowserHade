<?

function BrowserHade($agent = null, $type = 1) {
	if ($agent == null AND isset($_SERVER['HTTP_USER_AGENT'])) {
		$agent = $_SERVER['HTTP_USER_AGENT'];
	}
	elseif ($agent == null) return false;
	
	$browsers = array(
		//bots
		'bingbot' => 'bot',
		'Yahoo' => 'bot',
		'Googlebot' => 'bot',
		'MSNBot' => 'bot',
		'Teoma' => 'bot',
		'Scooter' => 'bot',
		'ia_archiver' => 'bot',
		'Lycos' => 'bot',
		'Yandex' => 'bot',
		'StackRambler' => 'bot',
		'Mail.Ru' => 'bot',
		'Aport' => 'bot',
		'WebAlta ' => 'bot',
		'Googlebot-Mobile' => 'bot',
		'Googlebot-Image' => 'bot',
		'Mediapartners-Google' => 'bot',
		'Adsbot-Google' => 'bot',
		'MSNBot-NewsBlogs' => 'bot',
		'MSNBot-Products' => 'bot',
		'MSNBot-Media' => 'bot',
		//bots end
		'UCBrowser' => 'UCBrowser',
		'YaBrowser' => 'Yandex.Browser',
		'iPhone' => 'iPhone',
		'iPod' => 'iPod',
		'iPad' => 'iPad',
		'Mac OS' => 'ios',
		'Firefox' => 'Firefox',
		'Opera' => 'Opera',
		'Opera Mini' => 'Opera.Mini',
		'MSIE' => 'Internet.Explorer',
		'TizenBrowser' => 'Tizen.Browser',
		'SymbianOS' => 'SymbianOS',
		'Windows Phone' => 'WindowsPhone',
		'Edge' => 'Edge',
		'Android' => 'Android',
		'Ucweb' => 'Ucweb',
		'Chrome' => 'Chrome',
		'BlackBerry' => 'BlackBerry',
		'safari' => 'safari',
		'Windows NT' => 'Internet.Explorer',
		'Netscape' => 'Netscape',
		//vk Bot gen link
		'vkShare' => 'vkShare',
		'Mozilla' => 'Mozilla',
	);
	$value = 'not-found';
    foreach ($browsers as $item => $value) { 
        if (preg_match("/". $item ."/", $agent, $match)) {  
			$outName = $value;
			if ($value == 'bot') {
				$outName = $item;
			}elseif ($type == 1) {
				$out = $value;
			}elseif ($type == 2) {
				$out = "<img height='16' width='16' style='margin-bottom:-2px' class='imgBrowserHade' title='{$outName}' alt='{$outName}' src='/ImagesBrowser/{$value}.png'>";
			}elseif ($type == 3) {
				$out = "<img height='16' width='16' style='margin-bottom:-2px' class='imgBrowserHade' title='{$outName}' alt='{$outName}' src='/ImagesBrowser/{$value}.png'>".' '.$outName;
			}elseif ($type == 4) {
				$out = "<img height='14' width='14' style='margin-bottom:-2px' class='imgBrowserHade' title='{$outName}' alt='{$outName}' src='/ImagesBrowser/{$value}.png'>".' '.$outName;
			}
			return $out;
        }	
    }
}
