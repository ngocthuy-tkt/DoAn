<?php
/**
 * Created by PhpStorm.
 * User: Truong
 * Date: 14/11/2018
 * Time: 10:12 CH
 */

namespace App\Repositories;


use App\Models\KhachHang;

class UserRepository implements UserInterface
{
    public function all()
    {
        $users = User::orderBy('id', 'desc')->get();
        return (isset($users)) ? $users : false;
    }

    public function findById($id)
    {
        $user = KhachHang::findOrFail($id);
        return (isset($user)) ? $user : false;
    }
}
