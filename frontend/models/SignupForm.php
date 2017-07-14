<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $cpf;
    public $name;
    public $designation;
    public $email;
    public $region;
    public $password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['cpf', 'trim'],
            ['cpf', 'required'],
            ['cpf', 'integer'],
            ['cpf', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This CPF has already been taken.'],

            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'string', 'max' => 100],

            ['designation', 'trim'],
            ['designation', 'required'],
            ['designation', 'string', 'max' => 100],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],

            ['region', 'trim'],
            ['region', 'required'],
            ['region', 'integer'],

            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->cpf = $this->cpf;
        $user->name = $this->name;
        $user->designation = $this->designation;
        $user->email = $this->email;
        $user->region = $this->region;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
