<?php

namespace App\Http\Controllers;

use App\Models\Ocene;
use Illuminate\Http\Request;

class OceneController extends Controller
{
    public function addGrade(request $request)
    {
        $request->validate
        ([
            'professor' => 'string|required',
            'subject' => 'string|required',
            'grade' => 'int|required|min:1|max:5'
        ]);

        Ocene::create([
           'professor' => $request->get('professor'),
           'subject' => $request->get('subject'),
           'grade' => $request->get('grade')
        ]);

        return redirect("/");
    }
}
