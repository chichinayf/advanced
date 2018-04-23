<?php

namespace app\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "arc_files".
 *
 * @property int $id 人工智能语音识别上传的文件的id
 * @property string $name 人工智能语音识别上传的文件的名字
 * @property string $filepath 人工智能语音识别上传的文件的路径
 * @property string $temppath 人工智能语音识别上传的文件的暂时路径
 * @property int $filesize 人工智能语音识别上传的文件的大小（单位是字节）
 * @property int $time 人工智能语音识别上传的文件的上传时间（时间戳）
 * @property int $user 人工智能语音识别上传的文件的人员（人员的id）
 * @property int $arcresult 人工智能语音识别结果
 */
class ArcFiles extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'arc_files';
	}
	public $file;
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [ 
				[ 
						[ 
								'file' 
						],
						'file',
						'skipOnEmpty' => true,
						'extensions' => 'pcm,wav',
						'maxFiles' => 4 
				] 
		];
	}
	
	/**
	 * 外键关联的表，关联user表
	 * @return \common\models\User
	 */
	public function getUsers(){
		// hasOne要求返回两个参数 第一个参数是关联表的类名 第二个参数是两张表的关联关系 
	    // 这里左边的id是user表的, 右边的是user是本表的
	    return $this->hasOne(User::className(), ['id' => 'user']);	
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [ 
				'file' => '请上传需要进行人工智能识别语音文件，只允许上传pcm以及wav文件' ,
				'id' => '文件编号' ,
				'name' => '文件名字' ,
				'filesize' => '文件大小' ,
				'filepath' => '文件路径' ,
				'temppath' => '文件临时路径' ,
				'time' => '上传时间' ,
				'username' => '上传用户' ,
				'users.username' => '上传用户' ,
				'arcresult' => '语音识别结果' ,
		];
	}
	
}
