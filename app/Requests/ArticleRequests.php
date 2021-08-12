<?php


namespace app\Requests;


class ArticleRequests extends Validator
{

    public function validated($data)
    {
        $this->validEmptyData($data);
    }
}