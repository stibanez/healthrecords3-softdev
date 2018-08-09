<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property int $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $birthdate
 * @property string $sex
 * @property string $civil_status
 * @property string $place_of_birth
 * @property string $nationality
 * @property string $religion
 * @property string $address_line1
 * @property string $address_line2
 * @property string $city
 * @property string $province
 * @property int $zip
 * @property string $email
 * @property string $phone_no
 *
 * @property MedicalRecord[] $medicalRecords
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'birthdate', 'sex', 'civil_status', 'place_of_birth', 'nationality', 'religion', 'address_line1', 'city', 'province', 'zip', 'email', 'phone_no'], 'required'],
            [['birthdate'], 'safe'],
            [['zip'], 'integer'],
            [['first_name', 'middle_name', 'last_name', 'place_of_birth', 'nationality', 'religion', 'address_line1', 'address_line2', 'city', 'province', 'phone_no'], 'string', 'max' => 45],
            [['sex', 'civil_status'], 'string', 'max' => 10],
            [['email'], 'string', 'max' => 85],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'birthdate' => 'Birthdate',
            'sex' => 'Sex',
            'civil_status' => 'Civil Status',
            'place_of_birth' => 'Place Of Birth',
            'nationality' => 'Nationality',
            'religion' => 'Religion',
            'address_line1' => 'Address Line1',
            'address_line2' => 'Address Line2',
            'city' => 'City',
            'province' => 'Province',
            'zip' => 'Zip',
            'email' => 'Email',
            'phone_no' => 'Phone No',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicalRecords()
    {
        return $this->hasMany(MedicalRecord::className(), ['patient_id' => 'id']);
    }
}
