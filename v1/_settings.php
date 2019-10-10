<?php

	//Получаем переменные из URL запроса
	if (isset($_GET['ids']) ) {
		$ids = htmlspecialchars($_GET["ids"]);
	}
	else {
		err();
	}                                             

	//Генерируется через яндекс
	$authToken = 'AgAAAAA2Y-564891Klkjglkj9079807FtAbL_oA';
	$url = 'https://api-metrika.yandex.ru/stat/v1/data';
	//$ids = '5514721';

	//Лимит на php
	ini_set("memory_limit","512M");

?>