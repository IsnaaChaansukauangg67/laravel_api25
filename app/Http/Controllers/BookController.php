<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Http\JsonResponse;
use App\Models\Book;
use Illuminate\Routing\Controller;

class BookController extends Controller 
{
    // menampilakan semua buku beserta author
    public function index(): JsonResponse
    {
        $books = Book::with('author')->get();
        return response()->json($books);
    }


    //Menampilkan detail satu buku
    public function show(string $id): JsonResponse
    { 
        $book = Book::with('author')->find($id);
        
        if ($book) {
            return response()->json( ['message' => 'Book not found'], 404);
        }
        
        return response()->json([
            'data' => $book,
            'message' => 'Detail buku berhasil diambil',
            'success' => true
        ]);
    }
}
