<?php

namespace models\classes;


use models\ImageModel;
use stdClass;

class Actor
{
    public int $id;
    public string $name;
    public ?Image $image;

    public function __construct(stdClass $rawUser)
    {
        $this->setId($rawUser->id);
        $this->setName($rawUser->name);
        $this->setImage($rawUser->image);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return ?Image
     */
    public function getImage(): ?Image
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(int $image): void
    {
        $imageModel = new ImageModel();
        $image = $imageModel->getById($image);
        $this->image =  $image ?: null;
    }
}