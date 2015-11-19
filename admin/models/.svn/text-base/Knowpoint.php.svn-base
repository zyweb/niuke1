<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "knowpoint".
 *
 * @property \MongoId|string $_id
 * @property mixed $know_id
 * @property mixed $know_name
 * @property mixed $level
 * @property mixed $parent_id
 */
class Knowpoint extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['niuke', 'knowpoint'];
    }

    /**
     * @return \yii\mongodb\Connection the MongoDB connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db');
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'know_id',
            'know_name',
            'level',
            'parent_id',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['know_name'], 'required','message'=>'知识点名称必须'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'know_id' => '指点的id',
            'know_name' => '知识点名称',
            'level' => '等级',
            'parent_id' => '父级',
        ];
    }
}
