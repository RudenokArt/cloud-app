<?php
/**
 * 
 */
class Config {
	
	public static $b24_webhook = 'https://192.168.100.5/rest/1/m70hyb64dk25q6bg/';

	public static function B24CurlRequest ($route='server.time.json', $params=[]) {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, self::$b24_webhook . $route);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_POST, 1);
		$data = $params;
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$re = curl_exec($curl);
		if ($re) {
			return (json_decode($re, true));
		} else {
			echo curl_error($curl);
		}
	}
}