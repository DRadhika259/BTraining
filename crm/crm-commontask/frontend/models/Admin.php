<?php

namespace frontend\models;
use yii\web\IdentityInterface;
use Yii;

class Admin extends \yii\db\ActiveRecord{
    public static function tableName(){
        return 'admin';
    }

    public function rules(){
        return [
            [['username', 'password'], 'required'],
            [['username', 'password', 'email'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'admin_id' => 'Admin ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email ID',
        ];
    }
}