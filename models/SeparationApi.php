<?php

namespace app\models;

use Yii;
use yii\base\BaseObject;

/**
 * Class SeparationApi
 * @package app\models
 */
class SeparationApi extends Separation
{
    public function separate()
    {
        $result = $this->calculation->separate();
        $this->saveResponse($result);
        return $result;
    }

    /**
     * @param $result
     */
    protected function saveResponse($result)
    {
        if (!is_null($result)) {
            $request = new Request($this->calculation->getAttributes());
            $request->setAttributes([
                'result' => $result,
                'user_id' => Yii::$app->user->getId()
            ]);

            $request->save();
        }
    }
}