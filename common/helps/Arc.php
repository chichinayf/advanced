<?php

namespace common\helps;



/**
 * 自定义的全局的公共的方法
 *
 * @author Administrator
 *        
 */
class Arc {
	/**
	 * 实现一句话语音识别restful模式
	 * 
	 * @param unknown $model        	
	 */
	public static function sendAsrPost($url, $filePath) {
		$audioFormat = 'pcm';
		$sampleRate = '16000';
		$akId = 'LTAIbgFM5AZELa73';
		$akSecret = 'fAJwUawP392rAiDRtQ70TT6EQyhcix';
		/*
		 * http header 参数
		 */
		$method = "POST";
		$accept = "application/json";
// 		$contentType = 'application/x-www-form-urlencoded'; // 语音文件的格式
        $contentType = 'audio/'.$audioFormat.';samplerate='.$sampleRate;//语音文件的格式
		$audioData = file_get_contents ( $filePath );
		$contentLength = strlen ( $audioData );
		$date = Tools::toGMTString ( time () );
		// 拿到字符串转化为的数组int型
		
		// 1.对body做MD5+BASE64加密
		$bodyMd5 = base64_encode ( md5 ( $audioData, true ) );
		$md52 = base64_encode ( md5 ( $bodyMd5, true ) );
		$stringToSign = $method . "\n" . $accept . "\n" . $md52 . "\n" . $contentType . "\n" . $date;
		// 2.计算 HMAC-SHA1
		$signature = base64_encode ( hash_hmac ( 'sha1', $stringToSign, $akSecret ,true) );
		// 3.得到 authorization header
		$authHeader = "Dataplus " . $akId . ":" . $signature;
		/**
		 * 这个是Http协议的请求，最有用
		 * @var Ambiguous $info
		 */
		$info = parse_url ( $url );
		//打开链接
		$fp = fsockopen ( $info ["host"], 80, $errno, $errstr, 30 );
		//发送的头
		$head = "POST " . $info ['path'] ."?".$info["query"]. " HTTP/1.0\r\n";
		$head .= "Host: " . $info ['host'] . "\r\n";
		$head .= "Referer: http://" . $info ['host'] . $info ['path'] ."?".$info['query'] . "\r\n";
		$head .= "Authorization: ".$authHeader."\r\n";
		$head .= "Accept: ".$accept."\r\n";
		$head .= "Content-type: ".$contentType."\r\n";
		$head .= "Date: ".$date."\r\n";
		$head .= "Content-Length: " . $contentLength . "\r\n";
		$head .= "\r\n";
		$head .= trim ( $audioData );
		$write = fputs ( $fp, $head );
		$result = fgets ( $fp );
		while ( ! feof ( $fp ) ) {
			$line = fgets ( $fp );
		}
		//得到结果
		return $line;
	}
	
}