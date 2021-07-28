<?php


namespace app\Requests;


use app\Exceptions\InvalidArgumentExceptions;

abstract class Validator
{
    private array $errors;
    protected array $date;

    public function __construct($date)
    {
        $this->date = $date;
        $this->validated($date);
    }

    abstract public function validated($data);

    public function validEmptyData($dataset) //TODO:: Сделать проверку входных элементов на пустое значение и по аналогии другие схожие проверки
    {
        foreach ($dataset as $key => $data) {
            if (empty($data)) {
                $this->catchErrorValidate('Поле ' . $key . ' пустое');
            }
        }
    }

    public function catchErrorValidate($message)
    {
        try {
            throw new InvalidArgumentExceptions($message);
        } catch (InvalidArgumentExceptions $e) {
            $this->addError($e->getMessage());
        }
    }

    public function addError($messageError)
    {
        $this->errors[] = $messageError;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}