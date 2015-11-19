<?php

namespace app\models;

use Yii;
use app\models\RealQuestion;

/**
 * This is the model class for collection "classify".
 *
 * @property \MongoId|string $_id
 * @property mixed $class_id
 * @property mixed $class_name
 */
class Classify extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['niuke', 'classify'];
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
            'class_id',
            'class_name',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_id', 'class_name'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'class_id' => 'Class ID',
            'class_name' => 'Class Name',
        ];
    }

    public function getTealQuestion(){
        return $this->hasMany(RealQuestion::className(),['class_id'=>'class_id']);
    }
}
