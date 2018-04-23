<?php

namespace common\helps;

use Yii;
use app\models\ArcFiles;
use yii\web\UploadedFile;

/**
 * 自定义的全局的公共的方法
 *
 * @author Administrator
 *        
 */
class UploadFiles {
	
	/**
	 * 上传多个文件，并验证上传的文件里面的规则，
	 *
	 * @return boolean
	 */
	public static function upload($model) {
		$basePath = Yii::$app->basePath;
		// 拿到年月的时间
		$timePath = date ( 'y/md/', time () );
		$filePath = $basePath . '/uploads/yuyin/' . $timePath;
		// 通过时间年月来创建文件夹
		Tools::mkdirs ( $filePath );
		if ($model->validate ()) {
			foreach ( $model->file as $file ) {
				$randomName = Tools::randName ();
				$fileName = $filePath . $file->baseName . $randomName . '.' . $file->extension;
				if (! file_exists ( $fileName )) { // 文件不存在就新建文件然后进行写入操作
					$myfile = fopen ( $fileName, "w" );
				}
				$fileUploadRes = $file->saveAs ( $fileName ,false);
				if($fileUploadRes){//上传成功
					$arcFiles = new ArcFiles();
					// 上传的文件的名字
					$arcFiles->name = $file->name;
					// 上传的的文件的路径，应该是相对路径，不然就出现无法访问了
					$arcFiles->filepath = '/uploads/yuyin/' . $timePath . $file->baseName . $randomName . '.' . $file->extension;
					// 上传的文件的大小
					$arcFiles->filesize = $file->size;
					// 上传的时间
					$arcFiles->time = time();
					// 用户的ID
					$arcFiles->user = Yii::$app->user->identity->id;
					$arcFiles->save();
				}else{
					return false;
				}
			}
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * 上传单个文件，并验证上传的文件里面的规则，并且实现语音识别
	 *
	 * @return boolean
	 */
	public static function upload_single($model) {
		//项目在服务器的绝对根路径
		$basePath = Yii::$app->basePath;
		// 拿到年月的时间
		$timePath = date ( 'y/md/', time () );
		$filePath = $basePath . '/uploads/yuyin/' . $timePath;
		// 通过时间年月来创建文件夹
		Tools::mkdirs ( $filePath );
		if ($model->validate ()) {
			foreach ( $model->file as $file ) {
				$randomName = Tools::randName ();
				$fileName = $filePath . $file->baseName . $randomName . '.' . $file->extension;
				if (! file_exists ( $fileName )) { // 文件不存在就新建文件然后进行写入操作
					$myfile = fopen ( $fileName, "w" );
				}
				$fileUploadRes = $file->saveAs ( $fileName ,false);
				if($fileUploadRes){//上传成功
					$arcFiles = new ArcFiles();
					// 上传的文件的名字
					$arcFiles->name = $file->name;
					// 上传的的文件的路径，应该是相对路径，不然就出现无法访问了
					$arcFiles->filepath = '/uploads/yuyin/' . $timePath . $file->baseName . $randomName . '.' . $file->extension;
					// 上传的文件的大小
					$arcFiles->filesize = $file->size;
					// 上传的时间
					$arcFiles->time = time();
					// 用户的ID
					$arcFiles->user = Yii::$app->user->identity->id;
					$saveRes = $arcFiles->save();
					//文件保存成功,而且数据库添加成功后，就立马将后台的文件发送到阿里云进行识别
					if($saveRes){
						$res = Arc::sendAsrPost('https://nlsapi.aliyun.com/recognize?model=chat',$basePath.$arcFiles->filepath);
						$result = json_decode($res);
						$arcFiles->arcresult = $result->result;
						$saveRes = $arcFiles->save();
						return $arcFiles->id;
					}else{
						return false;
					}
				}else{//上传失败
					return false;
				}
			}
			return true;
		} else {
			return false;
		}
	}
}