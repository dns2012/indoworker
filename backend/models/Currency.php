<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "currency".
 *
 * @property string $currency_id
 * @property string $description
 *
 * @property Country[] $countries
 */
class Currency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['currency_id'], 'required'],
            [['currency_id'], 'string', 'max' => 10],
            [['description'], 'string', 'max' => 30],
            [['currency_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'currency_id' => 'Currency ID',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountries()
    {
        return $this->hasMany(Country::className(), ['currency_id' => 'currency_id']);
    }
}
