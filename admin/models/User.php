<?php

namespace app\models;

use Yii;
use yii\mongodb\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for collection "user".
 *
 * @property \MongoId|string $_id
 * @property mixed $username
 * @property mixed $password
 */
class User extends ActiveRecord implements IdentityInterface
{
    public $authKey = 'aaa';
    public $accessToken;
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['niuke', 'user'];
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
            'username',
            'password',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required','message' =>'用户名密码必须']
        ];
    }

    public function login(){
        /*$info = User::find()->where(['username'=>$this->username])->asArray()->one();
        if($info['password'] == md5($this->password)){
            return true;
        }

        return false;*/
        $user = User::findOne(['username'=>$this->username]);
        if($user !== null){
            if($user->password == md5($this->password)){
                \Yii::$app->user->login($user,3600);
                return true;
            }
            return false;
        }else{
            return false;
        }
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'username' => '用户名',
            'password' => '密码',
        ];
    }

    public static function findByUsername($username) {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return User::findOne(['_id'=>$id]);
    }

    /**
     * @inheritdoc
     */


    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }
}
