<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "company".
 *
 * @property \MongoId|string $_id
 * @property mixed $com_id
 * @property mixed $com_name
 * @property mixed $com_img
 * @property mixed $com_look
 */
class Company extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['niuke', 'company'];
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
            'com_id',
            'com_name',
            'com_img',
            'com_look',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['com_id', 'com_name', 'com_img', 'com_look'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'com_id' => 'Com ID',
            'com_name' => 'Com Name',
            'com_img' => 'Com Img',
            'com_look' => 'Com Look',
        ];
    }
}
