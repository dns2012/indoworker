<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "job_location".
 *
 * @property int $job_location_id
 * @property string $street_address
 * @property string $city
 * @property string $state
 * @property string $country_id
 * @property string $zip
 *
 * @property Country $country
 * @property JobPost[] $jobPosts
 */
class JobLocation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job_location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['job_location_id'], 'required'],
            [['job_location_id'], 'integer'],
            [['street_address'], 'string', 'max' => 100],
            [['city', 'state', 'zip'], 'string', 'max' => 50],
            [['country_id'], 'string', 'max' => 10],
            [['job_location_id'], 'unique'],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'country_id']],
            [['country_id'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'job_location_id' => 'Job Location ID',
            'street_address' => 'Street Address',
            'city' => 'City',
            'state' => 'State',
            'country_id' => 'Country',
            'zip' => 'Zip',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['country_id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobPosts()
    {
        return $this->hasMany(JobPost::className(), ['job_location_id' => 'job_location_id']);
    }
}
