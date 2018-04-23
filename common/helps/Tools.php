<?php
namespace common\helps;
/**
 * 自定义的全局的公共的方法
 * @author Administrator
 *
 */
class Tools{
	/**
	 * 新建文件夹，实现级联创建文件夹
	 * @param unknown $dir
	 * @param number $mode
	 * @return boolean
	 */
	public static function mkdirs($dir, $mode = 0777)
	{
		if (is_dir($dir) || @mkdir($dir, $mode)) return true;
		if (!Tools::mkdirs(dirname($dir), $mode)) return false;
	
		return @mkdir($dir, $mode);
	}
	
	/**
	 * 根据月日分计算并创建目录
	 * @return string
	 */
	public static function mk_dir_bytime(){
		$dir = date('y/md', time());
		if(is_dir('./' .$dir)){
			return $dir;
		}else{
			mkdir('./'.$dir,0777,true);
			return $dir;
		}
	}
	
	/**
	 * 随机生成移动后的文件名  
	 */
	public static function randName() {  
	    $str = 'abcdefghijkmnpqrstwxyz23456789';  
	    return substr(str_shuffle($str),0,6);  
	}
	
	/**
	 * 转换一个String字符串为byte数组
	 * @param $str 需要转换的字符串
	 * @param $bytes 目标byte数组
	 * @author yufei
	 */
	public static function getBytes($string) {
		$bytes = array();
		for($i = 0; $i < strlen($string); $i++){
			$bytes[] = ord($string[$i]);
		}
		return $bytes;
	}
	
	/**
	 * 转换一个String字符串为byte数组
	 * @param $str 需要转换的字符串
	 * @param $bytes 目标byte数组
	 * @author yufei
	 */
	public static function getArrays($string) {
		$bytes = array();
		for($i = 0; $i < strlen($string); $i++){
			$bytes[] = $string[$i];
		}
		return $bytes;
	}
	
	/**
	 * 转换一个String字符串为byte数组
	 * @param $str 需要转换的字符串
	 * @param $bytes 目标byte数组
	 * @author yufei
	 */
	public static function setByteToString($audioData) {
		$str = "";
		for($i = 0; $i < strlen($audioData); $i++){
			$str  .= ord($audioData[$i]);
		}
		return $str;
	}
	
	/*
	 * 等同于javaScript中的 new Date().toUTCString();
	 */
	public static function toGMTString($time) {
		return gmdate("D, d M Y H:i:s", $time).' GMT';
	}
	
	/**
	 * 返回16位md5值
	 *
	 * @param string $str 字符串
	 * @return string $str 返回16位的字符串
	 */
	public static function shortMd5($str) {
		return substr(md5($str), 8, 16);
	}
	
}