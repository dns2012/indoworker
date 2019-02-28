<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "banner_quotes".
 *
 * @property int $id
 * @property string $quotes
 * @property string $name
 * @property string $company
 * @property string $photos
 * @property string $others_field
 */
class BannerQuotes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner_quotes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quotes', 'name', 'company', 'photos', 'others_field'], 'required'],
            [['quotes'], 'string'],
            [['name', 'company', 'photos', 'others_field'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quotes' => 'Quotes',
            'name' => 'Name',
            'company' => 'Company',
            'photos' => 'Photos',
            'others_field' => 'Others Field',
        ];
    }
}
