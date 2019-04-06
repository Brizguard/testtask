<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $phone
 * @property string $position
 * @property int $active
 * @property double $salary
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    public function rules()
    {
        return [
          [['name', 'surname', 'phone', 'position', 'active','salary'], 'required' ],
          [['salary'], 'double' ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'phone' => 'Телефон',
            'position' => 'Должность',
            'active' => 'Активность',
            'salary' => 'Зар. плата',
        ];
    }
}
