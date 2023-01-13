<?php

namespace models\classes;


use models\ActorModel;
use models\FilmModel;
use stdClass;

class Character
{
    public Actor $actor;
    public int $filmID;

    public string $name;

    public function __construct(stdClass $rawUser)
    {
        $this->setActor($rawUser->actorID);
        $this->setFilmID($rawUser->filmID);
        $this->setName($rawUser->name);
    }

    /**
     * @return Actor
     */
    public function getActor(): Actor
    {
        return $this->actor;
    }

    /**
     * @param int $actorID
     */
    public function setActor(int $actorID): void
    {
        $actorModel = new ActorModel();
        $this->actor = $actorModel->getById($actorID);
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
     * @return int
     */
    public function getFilmID(): int
    {
        return $this->filmID;
    }

    /**
     * @param int $filmID
     */
    public function setFilmID(int $filmID): void
    {
        $this->filmID = $filmID;
    }
}