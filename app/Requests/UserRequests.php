<?php


namespace app\Requests;

use app\Models\Users\User;

class UserRequests extends Validator //TODO:: Попробовать сделать обработку входных параметров черех массив и передавать их далее на валидацию по ссылке
{
    public function validated($data) //TODO: чтобы сделать валидацию более гибкой, нужен метод через массив проверяющий от куда данные, потом передавать ключ значение в подходящую функцию/метод
    {
        if ($data['route'] == 'users/register') {

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

        if ($data['route'] == 'users/login') { //авторизация

            if (empty($data['email'])) {
                $this->catchErrorValidate('Не передан email');
            } else $request['email'] = $data['email'];

            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $this->catchErrorValidate('Email не корректный');
            } if (!$data['email']) $request[] = $data['email'];

            if (empty($data['password_hash'])) {
                $this->catchErrorValidate('Не передан password');
            } else $request['password_hash'] = $data['password_hash'];

            if (mb_strlen($data['password_hash']) < 8) {
                $this->catchErrorValidate('Пароль должен быть не менее 8 символов');
            } if (!$data['password_hash']) $request[] = $data['password_hash'];

            $user = User::findOneByColumn('email', $data['email']);
            if ($user === null){
                $this->catchErrorValidate('Нет пользователя с таким email');
            }

            if (!password_verify($data['password_hash'], $user->getPasswordHash())) {
                $this->catchErrorValidate('Неправильный пароль');
            }

            if ($user !== null && !$user->getIsConfirmed()) {
                $this->catchErrorValidate('Пользователь не подтвержден');
            }
//                var_dump($request);
        }

    }

}