<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "job_post_skill_set".
 *
 * @property int $job_post_skill_set_id
 * @property int $skill_level
 * @property string $requirement
 *
 * @property JobPost[] $jobPosts
 */
class JobPostSkillSet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job_post_skill_set';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['job_post_skill_set_id'], 'required'],
            [['skill_level'], 'integer'],
            [['job_post_skill_set_id'], 'string', 'max' => 10],
            [['requirement'], 'string'],
            [['job_post_skill_set_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'job_post_skill_set_id' => 'Skill',
            'skill_level' => 'Skill Level',
            'requirement' => 'Requirement',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobPosts()
    {
        return $this->hasMany(JobPost::className(), ['job_post_skill_set_id' => 'job_post_skill_set_id']);
    }
}
