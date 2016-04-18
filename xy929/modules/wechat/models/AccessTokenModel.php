<?php

namespace app\modules\wechat\models;

use Yii;

/**
 * This is the model class for table "access_token".
 *
 * @property integer $id
 * @property string $access_token
 * @property integer $expire_time
 * @property integer $create_time
 * @property integer $update_time
 */
class AccessTokenModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'access_token';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['access_token', 'expire_time'], 'required'],
            [['expire_time', 'create_time', 'update_time'], 'integer'],
            [['access_token'], 'string', 'max' => 255],
            [['access_token'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'access_token' => 'Access Token',
            'expire_time' => 'Expire Time',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /*
     *默认插入和更新时间
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord){
                $this->create_time = time();
                $this->update_time = time();
            }else{
                $this->update_time = time();
            }
            return true;
        } else {
            return false;
        }
    }
}
