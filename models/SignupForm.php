<?php

namespace app\models;

use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $username;
    public $surname;
    public $email;
    public $password;
    public $confirm;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required',  'message' => 'Это поле не может быть пустым'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['surname', 'trim'],
            ['surname', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required',  'message' => 'Это поле не может быть пустым'],
            ['email', 'email',  'message' => 'email не соответствует стандарту user@mail.com'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required',  'message' => 'Это поле не может быть пустым'],
            ['password', 'string', 'min' => 6,  'message' => 'Пароль должен содержать 6 и более символов'],

            ['confirm', 'required',  'message' => 'Это поле не может быть пустым'],
            ['confirm', 'compare', 'compareAttribute' => 'password',  'message' => 'Пароли не совпадают'],
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
        $user->username = $this->username;
        $user->surname = $this->surname;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }

}