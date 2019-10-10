<?php
	//Вызываем функцию для url
	$json = curl_json_get_contents($url . '?' . http_build_query($params),$authToken);

	//Получаем структуру ответа
	$query = json_decode($json, true)['query'];
	//Получаем массив данных JOIN
	$data = json_decode($json, true)['data'];

	//Результирующий массив - пустой
	$data_array = array();
	//Счетчик для нового массива
	$iCount = 0;

	//Формируем итоговый массив данных, который будет печататься в CSV
	foreach($data as $key => $value){

		//Получаем наименования измерений
		foreach ($value['dimensions'] as $dimKey => $dimValue){
			$dimName = $query['dimensions'][$dimKey]; 
			$dimName = preg_replace('/[^a-zA-Zа-яА-Я0-9 \:]/ui', '',$dimName ); 
			$data_array[$iCount][$dimName] = $dimValue['name'];
		} 

		//Получаем показатели (значения)
		foreach ($value['metrics'] as $metricKey => $metricValue){
			$metricName = $query['metrics'][$metricKey];
			$metricName = preg_replace('/[^a-zA-Zа-яА-Я0-9 \:]/ui', '',$metricName );  
			$data_array[$iCount][$metricName] = $metricValue;
		}

		$iCount++;
	}
?>