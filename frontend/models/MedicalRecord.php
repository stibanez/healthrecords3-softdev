<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medical_record".
 *
 * @property integer $id
 * @property integer $patient_id
 * @property integer $doctor_id
 * @property string $description
 * @property string $date
 *
 * @property Doctor $doctor
 * @property Patient $patient
 * @property Views[] $views
 * @property Clerk[] $receptions
 */
class MedicalRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medical_record';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_id', 'doctor_id', 'description', 'date'], 'required'],
            [['patient_id', 'doctor_id'], 'integer'],
            [['description'], 'string'],
            [['date'], 'safe'],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['doctor_id' => 'id']],
            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['patient_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'patient_id' => 'Patient ID',
            'doctor_id' => 'Doctor ID',
            'description' => 'Description',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctor::className(), ['id' => 'doctor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['id' => 'patient_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViews()
    {
        return $this->hasMany(Views::className(), ['medical_record_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceptions()
    {
        return $this->hasMany(Clerk::className(), ['id' => 'reception_id'])->viaTable('views', ['medical_record_id' => 'id']);
    }
}
