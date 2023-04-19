<?php

abstract class HumanAbstarct
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function getGreetings(): string;
    abstract public function getMyNameIs(): string;

    public function introduceYourSelf(): string
    {
        return $this->getGreetings() . "! " . $this->getMyNameIs() . " " . $this->getName() . ".";
    }
}

class RussianHuman extends HumanAbstarct
{
    public function getGreetings(): string
    {
        return "Привет";
    }

    public function getMyNameIs(): string
    {
        return "Меня зовут ";
    }
}

class EnglishMan extends HumanAbstarct
{
    public function getGreetings(): string
    {
        return "Hello";
    }

    public function getMyNameIs(): string
    {
        return "My name is ";
    }
}

$russianHuman = new RussianHuman('Олег');

echo $russianHuman->introduceYourSelf() . PHP_EOL;

$englishHuman = new EnglishMan("Bob");

echo $englishHuman->introduceYourSelf();