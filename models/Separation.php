<?php

namespace app\models;

use Yii;
use yii\base\BaseObject;

/**
 * Class Separation
 * @package app\models
 */
abstract class Separation extends BaseObject
{
    protected $calculation;
    public $data = [];


    abstract public function separate();


    public function init()
    {
        $this->calculation = new Calculation();
        $this->calculation->setAttributes($this->data);
    }

    /**
     * @return mixed
     */
    public function checkData()
    {
        return $this->calculation->validate();
    }
}