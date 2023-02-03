<?php

namespace models\classes;


use DateTime;
use models\FilmModel;
use stdClass;
use utils\JsonHelpers;

class Comment
{
    public int $id;
    public string $message;
    public int $filmID;
    public string $date;

    public function __construct(stdClass $rawUser)
    {
        $this->setId($rawUser->id);
        $this->setMessage($rawUser->message);
        $this->setFilmID($rawUser->filmID);
        $this->setDate($rawUser->date);
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
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return int
     */
    public function getFilmID(): int
    {
        return $this->film;
    }

    /**
     * @param int $filmID
     */
    public function setFilmID(int $filmID): void
    {
        $this->filmID = $filmID;
    }

    /**
     * @return string
     */
    public function getDate(bool $preventFormatting = false): string
    {
        if ($preventFormatting) return $this->date;

        $date1 = new DateTime(); // date actuelle
        $date2 = new DateTime($this->date); // date donnée
        $diff = date_diff($date1, $date2);

        $content = 'il y a ';

        $tab = [
            'y' => 'an',
            'd' => 'jour',
            'h' => 'heure',
            'i' => 'minute',
            's' => 'seconde'
        ];

        foreach ($tab as $key => $value) {
            if ($diff->$key > 0) {
                return $content . $diff->$key . ' ' . $value . ($diff->$key > 1 ? 's' : '') . ' ';
            }
        }

        return $content . 'quelques secondes';
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }
}