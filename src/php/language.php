<?php
	if(!isset($_COOKIE["PHPSESSID"])) {
	  session_start();
	};
	$cookie_time = 31556926;

	$default_language = 'en';	// Set default language
	$available_languages = [	// Set available languages
    'ru' => ['ru','be','ky','ab','mo','et','lv'],
    'uk' => 'uk',
    'en' => 'en'
  ];

	/* Detect user language */
	function getUserLanguage($available_languages, $default_language) {
		if(($userLanguages = strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE']))) {
			if(preg_match_all('/([a-z]{1,8}(?:-[a-z]{1,8})?)(?:;q=([0-9.]+))?/', $userLanguages, $userLanguages)) {
				$userLanguagesArray = array_combine($userLanguages[1], $userLanguages[2]);
				foreach ($userLanguagesArray as $key => $value) {
					$userLanguagesArray[$key] = $value ? $value : 1;
				}
				arsort($userLanguagesArray, SORT_NUMERIC);
			}
			else {
				$userLanguagesArray = array();
			};
			$languages = array();
			foreach($available_languages as $language => $alias) {
				if(is_array($alias)) {
					foreach($alias as $aliasLanguage) {
						$languages[strtolower($aliasLanguage)] = strtolower($language);
					};
				}
				else {
					$languages[strtolower($alias)] = strtolower($language);
				};
			};
			foreach($userLanguagesArray as $key => $value) {
				$strtoked = strtok($key, '-');
				if(isset($languages[$strtoked])) {
					return $languages[$strtoked];
				};
			};
			return $default_language;
		};
		return $default_language;
	};

	/* Check language */
	function checkLanguage($language, $available_languages) {
		return array_key_exists($language, $available_languages) ? true : false;
	};

	/* Get language from url */
	function getUrlLanguage($available_languages) {
    $url_language = end((explode('/', rtrim($_SERVER["REQUEST_URI"], '/'))));
    if(checkLanguage($url_language, $available_languages)) {
      return $url_language;
    };
    return false;
  };
	/* Detect language */
	function getLanguage($available_languages, $default_language) {
	  $url_language = getUrlLanguage($available_languages);
	  if($url_language) {
      return $url_language;
	  }
		if(isset($_POST['language'])) {
			if(checkLanguage($_POST['language'], $available_languages)) {
				return $_POST['language'];
			};
		};
		if(isset($_SESSION['language'])) {
			if(checkLanguage($_SESSION['language'], $available_languages)) {
				return $_SESSION['language'];
			};
		};
		if(isset($_COOKIE['language'])) {
			if(checkLanguage($_COOKIE['language'], $available_languages)) {
				return $_COOKIE['language'];
			};
		};
		return getUserLanguage($available_languages, $default_language);
	};

	/* Set language */
	function setLanguage($language, $cookie_time) {
		$_SESSION['language'] = $language;
		setcookie('language', $language, time() + $cookie_time, '/'); // Set cookie
	};

	/* Get single language data */
	function getSingleLanguageData($array, $language) {
    if(!is_array($array)) {
      return $array;
    }
  	if(count($array) == 3 && array_key_exists('ru', $array) && array_key_exists('uk', $array) && array_key_exists('en', $array)) {
  		return $array[$language];
  	};
  	$result = array();
    foreach ($array as $key => $value) {
    	$result[$key] = getSingleLanguageData($value, $language);
    };
    return $result;
	};

	$current_language = getLanguage($available_languages, $default_language);
	require_once('languages/translate.php');	// Include languages file
	setLanguage($current_language, $cookie_time);
	$language = getSingleLanguageData($languages, $current_language);

	if(isset($_POST['type']) && $_POST['type'] == 'ajax') {
		$responce = json_encode($language);
		echo $responce;
	};
?>