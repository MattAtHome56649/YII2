<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property integer $country_id
 * @property string $country_name
 * @property integer $continent_id
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_name', 'continent_id'], 'required'],
            [['continent_id'], 'integer'],
            [['country_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'country_id' => 'Country ID',
            'country_name' => 'Country Name',
            'continent_id' => 'Continent ID',
        ];
    }
}
