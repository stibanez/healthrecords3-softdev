<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "doctor".
 *
 * @property int $id
 * @property int $hospital_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property int $user_id
 *
 * @property Hospital $hospital
 * @property User $user
 * @property MedicalRecord[] $medicalRecords
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hospital_id', 'first_name', 'last_name', 'user_id'], 'required'],
            [['hospital_id', 'user_id'], 'integer'],
            [['first_name', 'middle_name', 'last_name'], 'string', 'max' => 45],
            [['hospital_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hospital::className(), 'targetAttribute' => ['hospital_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hospital_id' => 'Hospital ID',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHospital()
    {
        return $this->hasOne(Hospital::className(), ['id' => 'hospital_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicalRecords()
    {
        return $this->hasMany(MedicalRecord::className(), ['doctor_id' => 'id']);
    }
}
