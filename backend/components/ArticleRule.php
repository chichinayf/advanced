<?php
namespace backend\components;


use yii\rbac\Rule;


class ArticleRule extends Rule
{
    public $name = 'article';
    public function execute($user, $item, $params)
    {
        // 这里先设置为false,逻辑上后面再完善
//         return isset($params['post']) ? $params['post']->createdBy == $user : false;
        return true;
    }
}