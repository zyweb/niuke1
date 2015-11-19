<?php

namespace app\models;

use Yii;
use app\models\Classify;
use yii\db\ActiveRecordInterface;

/**
 * This is the model class for collection "real_question".
 *
 * @property \MongoId|string $_id
 * @property mixed $rq_id
 * @property mixed $rq_title
 * @property mixed $rq_dity
 * @property mixed $rq_total
 * @property mixed $rq_desc
 * @property mixed $rq_img
 * @property mixed $com_id
 * @property mixed $class_id
 */
class RealQuestion extends \yii\mongodb\ActiveRecord implements ActiveRecordInterface
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['niuke', 'real_question'];
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
            'rq_id',
            'rq_title',
            'rq_dity',
            'rq_total',
            'rq_desc',
            'rq_img',
            'rq_center',
            'com_id',
            'class_id',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rq_id', 'rq_title', 'rq_dity','rq_center', 'rq_total', 'rq_desc', 'rq_img', 'com_id', 'class_id'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'rq_id' => '真题id',
            'rq_title' => '真题标题',
            'rq_dity' => '难度系数',
            'rq_total' => '总分数',
            'rq_desc' => '题目说明',
            'rq_img' => '真题图片',
            'com_id' => '所属公司',
            'rq_center' => '考点',
            'class_id' => '所属类型',
        ];
    }

    public function getClassify(){

        return $this->hasOne('app\models\Classify',['class_id'=>'class_id']);

    }

}
