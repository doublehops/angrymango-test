<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class TestModel extends Model
{
    public $name;
    public $number;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'number'], 'required'],
			['name', 'match', 'pattern' => '/^[a-zA-Z .]+$/', 'message' => 'Valid chars are A-Z, space and full-stop.'],
			['number', 'match', 'pattern' => '/^[0-9.]+$/', 'message' => 'Valid chars are 0-9 and full-stop.'],
        ];
    }
}
