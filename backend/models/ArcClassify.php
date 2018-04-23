<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "arc_classify".
 *
 * @property int $id 分类种类模型的id
 * @property string $name 分类种类模型的种类
 * @property string $content 需要根据其进行分类的内容，可存成json字符串，根据json字符串来识别
 */
class ArcClassify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'arc_classify';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'content'], 'required'],
            [['content'], 'string'],
            [['name'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'content' => 'Content',
        ];
    }
}
