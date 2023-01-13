<?php

namespace models;

use models\base\SQL;
use models\classes\Image;

class ImageModel extends SQL
{
    private string $uploadDir = ROOT_PATH . "/public/uploads/";
    private string $urlDomain = DOMAIN;

    public function __construct()
    {
        parent::__construct('images');
    }

    public function getAll(): ?array
    {
        $data = parent::getAll();
        return $data ? array_map(function ($image) {
            return new Image($image);
        }, $data) : null;
    }

    public function getById(int $id): ?Image
    {
        $data = parent::getOne($id);
        return $data ? new Image($data) : null;
    }

    public function create(array $image, string $alt = ''): bool
    {
        //upload image
        $url = $this->uploadImage($image);
        if (!$url) {
            return false;
        }
        $stmt = $this->getPdo()->prepare("INSERT INTO $this->tableName (url, alt) VALUES (?, ?)");
        return $stmt->execute([$url, $alt]);
    }

    private function uploadImage(array $image): ?string
    {
        $extension = pathinfo(basename($image['name']), PATHINFO_EXTENSION);
        $target_file = $this->uploadDir . uniqid() . '.' . $extension;
        $url = $this->urlDomain . str_replace(ROOT_PATH, '', $target_file);
        if (getimagesize($image['tmp_name']) !== false) {
            return move_uploaded_file($image["tmp_name"], $target_file) ? $url : null;
        }
        return null;
    }

    public function delete(int $id): bool
    {
        $image = $this->getById($id);
        if (!$image) {
            return false;
        }
        $stmt = $this->getPdo()->prepare("DELETE FROM $this->tableName WHERE id = ?");
        $stmt->execute([$id]);
        return unlink(ROOT_PATH . str_replace(DOMAIN, '', $image->getUrl()));
    }
}