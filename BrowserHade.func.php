<?php

/**
 * BrowserHade
 *
 * @author Djkohade
 * @version 2.0.0
 * @created 2017
 * @updated 2024
 * Function to identify the browser based on the User-Agent string.
 *
 * @param string|null $agent The User-Agent string. If null, the function will use the server's User-Agent.
 * @param int $type The type of output format:
 *                  1 - Returns the browser name,
 *                  2 - Returns an HTML image tag for the browser icon,
 *                  3 - Returns an HTML image tag and the browser name,
 *                  4 - Returns a smaller HTML image tag and the browser name.
 * @return string|false Returns the specified output or false if no User-Agent is provided.
 *
 * Функция для определения браузера на основе строки User-Agent.
 *
 * @param string|null $agent Строка User-Agent. Если null, функция будет использовать User-Agent сервера.
 * @param int $type Тип формата вывода:
 *                  1 - Возвращает название браузера,
 *                  2 - Возвращает HTML-тег изображения для иконки браузера,
 *                  3 - Возвращает HTML-тег изображения и название браузера,
 *                  4 - Возвращает меньший HTML-тег изображения и название браузера.
 * @param string $imagePath Путь к папке с изображениями браузеров.
 * @return string|false Возвращает указанный вывод или false, если User-Agent не предоставлен.
 */
 
function BrowserHade($agent = null, $type = 1) {
	//Папка с иконками
	$imagePath = '/ImagesBrowser/'
    // Используем User-Agent сервера, если не указан
    if (empty($agent) && !empty($_SERVER['HTTP_USER_AGENT'])) {
        $agent = $_SERVER['HTTP_USER_AGENT'];
    } elseif (empty($agent)) {
        return false; // Возвращаем false, если User-Agent не найден
    }
	
    // Список известных браузеров и ботов
	$browsers = [
		// Боты
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
		'WebAlta' => 'bot',
		'Googlebot-Mobile' => 'bot',
		'Googlebot-Image' => 'bot',
		'Mediapartners-Google' => 'bot',
		'Adsbot-Google' => 'bot',
		'MSNBot-NewsBlogs' => 'bot',
		'MSNBot-Products' => 'bot',
		'MSNBot-Media' => 'bot',
		'AhrefsBot' => 'bot',
		'SemrushBot' => 'bot',
		'BingPreview' => 'bot',
		'DotBot' => 'bot',
		'Screaming Frog SEO Spider' => 'bot',
		// Конец ботов
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
		// vk Bot gen link
		'vkShare' => 'vkShare',
		'Mozilla' => 'Mozilla',
		'Edg/' => 'Edge',
		'OPR/' => 'Opera',
		'Fennec/' => 'Firefox.Mobile',
		'Vivaldi/' => 'Vivaldi',
		'Brave/' => 'Brave',
		'Konqueror' => 'Konqueror',
		'Midori' => 'Midori',
	];


    // Проверяем User-Agent на соответствие известным браузерам
    foreach ($browsers as $item => $value) {
        if (preg_match("/" . preg_quote($item, '/') . "/i", $agent)) {
            $outName = $value;
            if ($value == 'bot') {
                $outName = $item; // Если это бот, используем имя бота
            }

            // Определяем вывод в зависимости от типа
            switch ($type) {
                case 1:
                    return $value; // Возвращаем название браузера
                case 2:
                    return "<img height='16' width='16' class='imgBrowserHade' title='{$outName}' alt='{$outName}' src='{$imagePath}{$value}.png'>"; // Возвращаем только тег изображения
                case 3:
                    return "<img height='16' width='16' class='imgBrowserHade' title='{$outName}' alt='{$outName}' src='{$imagePath}{$value}.png'> " . $outName; // Возвращаем тег изображения и название
                case 4:
                    return "<img height='14' width='14' class='imgBrowserHade' title='{$outName}' alt='{$outName}' src='{$imagePath}{$value}.png'> " . $outName; // Возвращаем меньший тег изображения и название
                default:
                    return false; // Возвращаем false для неизвестного типа
            }
        }
    }
    return 'не найден'; // Возвращаем 'не найден', если браузер не найден
}

?>