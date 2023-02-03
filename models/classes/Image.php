<?php

namespace models\classes;

use stdClass;

class Image
{
    public int $id;
    public string $url;
    public string $alt;

    public function __construct(stdClass $rawUser)
    {
        $this->setId($rawUser->id);
        $this->setUrl($rawUser->url);
        $this->setAlt($rawUser->alt);
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
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $urlDomain = parse_url($url, PHP_URL_HOST);
        $realDomain = parse_url(DOMAIN, PHP_URL_HOST);
        $url = str_replace($urlDomain, $realDomain, $url);
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getAlt(): string
    {
        return $this->alt;
    }

    /**
     * @param string $alt
     */
    public function setAlt(string $alt): void
    {
        $this->alt = $alt;
    }
}