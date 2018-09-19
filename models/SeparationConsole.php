<?php

namespace app\models;

/**
 * Class SeparationConsole
 * @package app\models
 */
class SeparationConsole extends Separation
{
    /**
     * @return mixed
     */
    public function separate()
    {
        $result = $this->calculation()->separate();
        return $result;
    }

}