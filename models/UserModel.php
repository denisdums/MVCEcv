<?php
namespace models;

use models\base\SQL;

class UserModel extends SQL
{
    public function __construct()
    {
        parent::__construct('users');
    }
}