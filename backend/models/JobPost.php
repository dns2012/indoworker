<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "job_post".
 *
 * @property int $job_post_id
 * @property int $job_location_id
 * @property int $job_type_id
 * @property string $job_post_skill_set_id
 * @property string $job_description
 * @property int $salary
 * @property int $is_active active=1; closed=0
 * @property int $is_available 1=available; 0=unavailabe
 * @property string $created_date
 * @property int $created_by Connect to user_admin
 *
 * @property UserAdmin $createdBy
 * @property JobLocation $jobLocation
 * @property JobPostSkillSet $jobPostSkillSet
 * @property JobPostActivity[] $jobPostActivities
 * @property User[] $userAccounts
 */
class JobPost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job_post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['job_location_id', 'job_type_id', 'salary','show_salary', 'is_active', 'is_available', 'created_by', 'deduction', 'show_deduction', 'soon_require', 'premium_job', 'contract'], 'integer'],
            [['job_location_id', 'job_type_id', 'job_post_skill_set_id', 'job_description', 'job_title', 'placement', 'created_by'], 'required'],
            [['job_description', 'job_title', 'company', 'placement', 'for_gender'], 'string'],
            [['created_date'], 'safe'],
            [['job_post_skill_set_id'], 'string', 'max' => 10],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => UserAdmin::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['job_location_id'], 'exist', 'skipOnError' => true, 'targetClass' => JobLocation::className(), 'targetAttribute' => ['job_location_id' => 'job_location_id']],
            [['job_post_skill_set_id'], 'exist', 'skipOnError' => true, 'targetClass' => JobPostSkillSet::className(), 'targetAttribute' => ['job_post_skill_set_id' => 'job_post_skill_set_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'job_post_id' => 'Job Post ID',
            'job_location_id' => 'Country',
            'job_type_id' => 'Job Type ID',
            'job_post_skill_set_id' => 'Skill ID',
            'job_description' => 'Job Description',
            'salary' => 'Salary',
            'show_salary' => 'Show Salary',
            'deduction' => ' Deduction',
            'show_deduction' => 'Show Deduction',
            'is_active' => 'Is Active',
            'is_available' => 'Is Available',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'job_title' => 'Job Title',
            'company' => 'Company',
            'for_gender' => 'For Gender',
            'placement' => 'Placement',
            'premium_job'=>'Premium Job',
            'contract'=>'Contract (Years)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(UserAdmin::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobLocation()
    {
        return $this->hasOne(JobLocation::className(), ['job_location_id' => 'job_location_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobPostSkillSet()
    {
        return $this->hasOne(JobPostSkillSet::className(), ['job_post_skill_set_id' => 'job_post_skill_set_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobPostActivities()
    {
        return $this->hasMany(JobPostActivity::className(), ['job_post_id' => 'job_post_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAccounts()
    {
        return $this->hasMany(User::className(), ['user_account_id' => 'user_account_id'])->viaTable('job_post_activity', ['job_post_id' => 'job_post_id']);
    }
}
