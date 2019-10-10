﻿<?php

// ======= БУФЕР =========
//Включение буферизации вывода
ob_start();

//========================================================
// НАСТРОЙКИ: ПОЛУЧАЕМ ОБЩИЕ ПЕРЕМЕННЫЕ
//========================================================
	include '_settings.php';

//========================================================
// ФУНКЦИИ
//========================================================

	include '_functions.php';

//========================================================
// ТЕЛО ЗАПРОСА
//========================================================

	//++++++++++++++++++++++++++++++++++++++++++++++++
	// ЗДЕСЬ ФОРМИРУЕМ ПАРАМЕТРЫ ЗАПРОСА
	// Измерения, Метрики и т.д.
	// !!! В параметрах не должно быть пробелов !!!
	//++++++++++++++++++++++++++++++++++++++++++++++++
	$params = [
		'ids'         => $ids,
		'accuracy'    => 'full',
		'metrics'     => 'ym:s:users,ym:s:visits,ym:s:pageviews,ym:s:bounceRate,ym:s:pageDepth,ym:s:avgVisitDurationSeconds',
		'dimensions'  => 'ym:s:date,ym:s:<attribution>TrafficSource,ym:s:<attribution>SourceEngine,ym:s:gender',
		'date1'       => '720daysAgo',
		'date2'       => 'yesterday',
		'sort'        => 'ym:s:date',
		'limit'       => '100000'
	];


//========================================================
// ФОРМИРУЕМ МАССИВ ДАННЫХ ДЛЯ ПЕЧАТИ В CSV
//========================================================
	include '_make_arraydata.php';


// ======= БУФЕР =========
//Очищаем все выходные буферы (удаляем весь мусор из страницы перед печатью CSV)
ob_end_clean();

//========================================================
// ПЕЧАТАЕМ МАССИВ ДАННЫХ В CSV
//========================================================
	include '_print_csv.php';

// ======= БУФЕР =========
//Возвращаем содержимое буфера вывода (наш сформированный csv)
ob_get_contents();

?>