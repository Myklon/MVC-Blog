<?php

namespace app\interfaces\services;

interface Database
{
    public function query(string $sql, $params = []);
}