<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property string $country_id
 * @property string $description
 * @property string $currency_id
 *
 * @property Currency $currency
 * @property JobLocation[] $jobLocations
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_id'], 'required'],
            [['country_id', 'currency_id'], 'string', 'max' => 10],
            [['description'], 'string', 'max' => 100],
            [['rupiah'], 'integer'],
            [['country_id'], 'unique'],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::className(), 'targetAttribute' => ['currency_id' => 'currency_id']],
            [['currency_id'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'country_id' => 'Country ID',
            'description' => 'Description',
            'currency_id' => 'Currency',
            'rupiah' => 'Kurs (Rupiah)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['currency_id' => 'currency_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobLocations()
    {
        return $this->hasMany(JobLocation::className(), ['country_id' => 'country_id']);
    }
}
