<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "contact_us".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $message
 * @property string $created_date
 * @property string $created_by optional
 */
class ContactUs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact_us';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['created_date'], 'safe'],
            [['name', 'email', 'phone', 'created_by'], 'string', 'max' => 255],
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
            'email' => 'Email',
            'phone' => 'Phone',
            'message' => 'Message',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
        ];
    }
}
