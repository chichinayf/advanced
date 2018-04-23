<?php

namespace app\models\search;

use app\models\ArcFiles;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ArcFilesSearchModel represents the model behind the search form of `app\models\ArcFiles`.
 */
class ArcFilesSearchModel extends ArcFiles
{
	public $username;//外键关联表user表的用户名字
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'username','arcresult'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ArcFiles::find();

        // add conditions that should always apply here
        $query->joinWith(['users']);
        $query->select("arc_files.*, user.username");
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'arc_files.id' => $this->id,
            'filesize' => $this->filesize,
            'time' => $this->time,
        ]);
        
        /**
         * 实现模糊查询
         */
        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'arcresult', $this->arcresult])
            ->andFilterWhere(['like', 'user.username', $this->username]);

        return $dataProvider;
    }
}
