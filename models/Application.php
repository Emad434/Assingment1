<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $date_of_birth
 * @property string|null $description
 * @property float|null $income
 * @property int|null $number_of_dependants
 * @property string $created_at
 * @property string $updated_at
 */
class Application extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'date_of_birth'], 'required'],
            [['first_name', 'last_name'], 'string', 'max' => 255],
            [['description'], 'string'],
            [['income'], 'number'],
            [['number_of_dependants'], 'integer'],
            [['date_of_birth'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'date_of_birth' => 'Date Of Birth',
            'description' => 'Description',
            'income' => 'Income',
            'number_of_dependants' => 'Number Of Dependants',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
