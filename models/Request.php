<?php

namespace app\models;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property int $user_id
 * @property string $sequence
 * @property int $number
 * @property int $result
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'sequence', 'number', 'result'], 'required'],
            [['user_id', 'number', 'result'], 'integer'],
            [['sequence'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'sequence' => 'Sequence',
            'number' => 'Number',
            'result' => 'Result',
        ];
    }
}
