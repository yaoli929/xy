<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $status
 * @property integer $created_time
 * @property integer $updated_time
 */
class AdminModel extends \yii\db\ActiveRecord
{
    public $authKey="xy929";

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['status'], 'integer'],
            [['username', 'password', 'create_time', 'update_time'], 'string', 'max' => 255],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'status' => 'Status',
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
                $this->create_time = date('Y-m-d H:i:s');
                $this->update_time = date('Y-m-d H:i:s');
            }else{
                $this->update_time = date('Y-m-d H:i:s');
            }
            return true;
        } else {
            return false;
        }
    }
}
