<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "admin_privilege".
 *
 * @property int $id
 * @property int $role_id
 * @property string $menu_id
 * @property string $privilege
 */
class AdminPrivilege extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin_privilege';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_id', 'menu_id', 'privilege'], 'required'],
            [['role_id'], 'integer'],
            [['menu_id', 'privilege'], 'string', 'max' => 200],
            [['role_id', 'menu_id'], 'unique', 'targetAttribute' => ['role_id', 'menu_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role ID',
            'menu_id' => 'Menu ID',
            'privilege' => 'Privilege',
        ];
    }
}
