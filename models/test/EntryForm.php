<?php
/**
 * 表单验证
 */

namespace app\models\test;
 
use yii\base\Model;
 
class EntryForm extends Model
{
    public $name;
    public $email;
 
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
}