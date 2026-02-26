<?php

namespace App\Http\Controllers;

use App\Models\BookModel;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function pdfText(BookModel $book)
    {
        $pdfPath = Storage::disk('public')->path($book->content);

        $parser = new Parser();
        $pdf = $parser->parseFile($pdfPath);

        $text = $pdf->getText();

        return view('pdfText', compact('text', 'book'));
    }
}
