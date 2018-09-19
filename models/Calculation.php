<?php

namespace app\models;

use yii\base\Model;

/**
 * Class Calculation
 * @package app\models
 */
class Calculation extends Model
{
    public $sequence;
    public $number;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['sequence', 'number'], 'required'],
            [['sequence', 'number'], 'safe'],
            [['number'], 'integer'],
        ];
    }

    /**
     * @return int|null
     */
    public function separate()
    {
        if ($this->validate()) {
            $array = explode(',', $this->sequence);

            $result = -1;
            $count = 0;
            foreach ($array as $value) {
                if($value == $this->number) {
                    $count++;
                }
            }

            if ($count > 0 && $count < count($array)){
                $result = count($array) - $count;
            }

            return $result;
        }

        return null;
    }
}
