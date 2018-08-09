<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hospital".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 *
 * @property Clerk[] $clerks
 * @property Doctor[] $doctors
 */
class Hospital extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hospital';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address'], 'required'],
            [['name'], 'string', 'max' => 45],
            [['address'], 'string', 'max' => 85],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClerks()
    {
        return $this->hasMany(Clerk::className(), ['hospital_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctors()
    {
        return $this->hasMany(Doctor::className(), ['hospital_id' => 'id']);
    }
}
