<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Book;

class AuthorController extends Controller
{
    public function showAuthors() {
        $authors = Author::all();
        return view('author', ['authors' => $authors]);
    }
     
}
