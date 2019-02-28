<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "job_type".
 *
 * @property int $job_type_id
 * @property string $job_description
 *
 * @property JobPost[] $jobPosts
 */
class JobType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['job_description','min_edu'], 'required'],
            [['job_type_id', 'height', 'age_min', 'age_max'], 'integer'],
            [['job_description','group_type','min_edu'], 'string'],
            [['job_type_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'job_type_id' => 'Job Type ID',
            'job_description' => 'Job Description',
            'group_type' => 'Group Type',
            'min_edu' => 'Min. Pendidikan',
            'age_min' => 'Min. Usia',
            'age_max' => 'Max. Usia',
            'height' => 'Min. Tinggi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobPosts()
    {
        return $this->hasMany(JobPost::className(), ['job_type_id' => 'job_type_id']);
    }
}
