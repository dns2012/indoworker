<?php

namespace backend\models;

use Yii;

/**
 *
 */
class JobPostActivity extends \yii\db\ActiveRecord
{

  public static function tableName()
  {
      return 'job_post_activity';
  }

  public function labelPriority($priority=0) {
    if($priority == 1) {
      return "First Priority";
    } elseif($priority == 2) {
      return "Second Priority";
    } elseif($priority == 3) {
      return "Third Priority";
    }
  }
}
