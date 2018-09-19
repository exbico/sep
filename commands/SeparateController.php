<?php

namespace app\commands;

use app\models\SeparationConsole;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * Class SeparateController
 * @package app\commands
 */
class SeparateController extends Controller
{
    /**
     * @param string $sequence
     * @param string $number
     * @return int Exit code
     */
    public function actionIndex($sequence, $number)
    {
        $separation = new SeparationConsole([
            'data' => [
                'sequence' => $sequence,
                'number' => $number
            ]
        ]);

        if (!$separation->checkData()) {
            echo "One of the parameters specified is missing or invalid\n";
            return ExitCode::UNSPECIFIED_ERROR;
        }

        $result = $separation->separate();

        echo $result . "\n";

        return ExitCode::OK;
    }
}
