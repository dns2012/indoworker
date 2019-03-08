<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "religion".
 *
 * @property string $ID
 * @property string $description
 */
class Religion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'religion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID'], 'required'],
            [['ID'], 'string', 'max' => 15],
            [['description'], 'string', 'max' => 50],
            [['ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'description' => 'Description',
        ];
    }
}
