<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Book;


class CardController extends Controller
{
    public function showCard($bookId) {
        $bookId = Book::find($bookId);
        $author = Author::find($bookId->author_id);
        return view('card', ['bookId' => $bookId, 'author' => $author]);
    }
    
}

