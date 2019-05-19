<?php
/**
 * Created by PhpStorm.
 * User: Truong
 * Date: 14/11/2018
 * Time: 10:12 CH
 */

namespace App\Repositories;


use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminRepository implements AdminInterface
{

    public function allNotMe()
    {
        $admins = Admin::where('id', '!=', Auth::guard('admin')->user()->id)->get();
        return $admins;
    }

    public function findById($id)
    {
        $admin = Admin::findOrFail($id);
        return (isset($admin)) ? $admin : false;
    }
}