<?php
/**
 * Created by PhpStorm.
 * User: Truong
 * Date: 14/11/2018
 * Time: 10:12 CH
 */

namespace App\Repositories;


use App\Models\Author;

class AuthorRepository implements AuthorInterface
{

    public function all()
    {
        $authors = Author::with('product')->orderBy('id', 'desc')->get();
        return (isset($authors)) ? $authors : false;
    }

    public function findById($id)
    {
        $author = Author::with('product')->where('id', '=', $id)->first();
        return (isset($author)) ? $author : false;
    }
}