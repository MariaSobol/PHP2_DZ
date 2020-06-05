<?php
/*
 * От класса Person наследуются классы User и Manager
 * Класс Admin наследуется от класса Manager, поскольку должен включать в себя все методы класса Manager
 * (возможно стоит сделать наследование класса Manager от User, а не от Person)
 */

class Person
{
    private int $id;
    private string $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

}