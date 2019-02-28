<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_admin".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password
 * @property string $password_reset_token
 * @property string $email
 * @property int $role
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property JobPost[] $jobPosts
 */
class UserAdmin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role', 'status', 'created_at', 'updated_at'], 'integer'],
            [['status'], 'required'],
            [['first_name', 'last_name'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password', 'password_reset_token', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password' => 'Password',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'role' => 'Role',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobPosts()
    {
        return $this->hasMany(JobPost::className(), ['created_by' => 'id']);
    }
}
