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

    //Общий блок валидаци
    public function validEmptyData($dataSet) //TODO:: Сделать проверку входных элементов на пустое значение и по аналогии другие схожие проверки
    {
        foreach ($dataSet as $key => $data) {
            if (empty($data)) {
                $this->catchErrorValidate('Поле ' . $this->translationOfTheNameOfFields($key) . ' пустое');
            }
        }
    }

    public function translationOfTheNameOfFields ($value): string
    {
        $names = [
          'name' => 'название',
          'text' => 'текст',
          'age' => 'возраст',
          'nickname' => 'никнейм'
        ];

        foreach ($names as $kay => $name){
            if ($kay === $value) {
                return $name;
            }
        }
    }

    //общий отлов ошибок
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

    public function getErrors()
    {
        if(!empty($this->errors)) return $this->errors; else {
            return false;
        }
    }
}