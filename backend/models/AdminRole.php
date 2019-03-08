<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "admin_role".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 *
 * @property UserAdmin[] $userAdmins
 */
class AdminRole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAdmins()
    {
        return $this->hasMany(UserAdmin::className(), ['role' => 'id']);
    }
}
