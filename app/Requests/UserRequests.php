<?php


namespace app\Requests;

class UserRequests extends Validator //TODO:: Попробовать сделать обработку входных параметров черех массив и передавать их далее на валидацию по ссылке
{
    public function validated($data)
    {
        $this->validEmptyData($data);

        if (!preg_match('/[a-zA-Z0-9]+/', $data['nickname'])) {
            $this->catchErrorValidate('Nickname может состоять только из символов латинского алфавита и цифр');
        }

        if (empty($data['first_name'])) {
            $this->catchErrorValidate('Не передан first_name');
        }

        if (empty($data['email'])) {
            $this->catchErrorValidate('Не передан email');
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->catchErrorValidate('Email не корректный');
        }

        if (empty($data['password_hash'])) {
            $this->catchErrorValidate('Не передан password');
        }

        if (mb_strlen($data['password_hash']) < 8) {
            $this->catchErrorValidate('Пароль должен быть не менее 8 символов');
        }
    }


}