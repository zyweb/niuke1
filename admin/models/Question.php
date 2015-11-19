<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "question".
 *
 * @property \MongoId|string $_id
 * @property mixed $q_id
 * @property mixed $q_title
 * @property mixed $q_type
 * @property mixed $q_selects
 * @property mixed $q_answer
 * @property mixed $know_id
 * @property mixed $rq_id
 * @property mixed $label
 * @property mixed $join_sum
 */
class Question extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['niuke', 'question'];
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
            'q_id',
            'q_title',
            'q_type',
            'q_selects',
            'q_answer',
            'know_id',
            'rq_id',
            'label',
            'join_sum',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['q_id','q_title', 'q_type', 'q_selects', 'q_answer', 'know_id', 'rq_id', 'label', 'join_sum'], 'required','message'=>'不能为空！']
        ];
    }

    /**
     * 设置场景
     * @return array
     */
    public function scenarios(){
        $parent = parent::scenarios();
        $parent['add'] = ['q_title','label'];
        return $parent;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'q_id' => '试题id',
            'q_title' => '试题名称',
            'q_type' => '试题类型',
            'q_selects' => '试题选项',
            'q_answer' => '试题答案',
            'know_id' => '知识点',
            'rq_id' => '真题',
            'label' => '考点',
            'join_sum' => '参与人数',
        ];
    }
}
