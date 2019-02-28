<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "facility".
 *
 * @property int $facility_id
 * @property string $title
 * @property string $content
 * @property resource $photo1
 * @property resource $photo2
 * @property resource $photo3
 * @property resource $photo4
 * @property resource $photo5
 */
class Facility extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'facility';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'photo1', 'photo2', 'photo3', 'photo4', 'photo5'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'facility_id' => 'Facility ID',
            'title' => 'Title',
            'content' => 'Content',
            'photo1' => 'Photo1',
            'photo2' => 'Photo2',
            'photo3' => 'Photo3',
            'photo4' => 'Photo4',
            'photo5' => 'Photo5',
        ];
    }
}
