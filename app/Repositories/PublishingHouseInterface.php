<?php
/**
 * Created by PhpStorm.
 * User: Truong
 * Date: 14/11/2018
 * Time: 10:10 CH
 */

namespace App\Repositories;


interface PublishingHouseInterface
{
    public function all();

    public function findById($id);
}