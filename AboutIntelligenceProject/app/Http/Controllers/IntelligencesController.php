<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\informationRequest;
use App\Models\categoryModel;
use App\Models\informationModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class IntelligencesController extends Controller
{
    public function createInfo(informationRequest $request)
    {
        $information = informationModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_id' => $request->user_id,
            'country' => $request->country,
        ]);
        return redirect()->route('information.show', $information->id);

    }

    public function categoryCreate(CategoryRequest $request)
    {
        $catInfo = categoryModel::create([
            'information_id' => $request->information_id,
            'category' => $request->category,
            'percent' => $request->percent,
        ]);

        return redirect()->route('related.show', $catInfo->id);

    }

    public function show(informationModel $information)
    {
        return view('information', compact('information'));
    }

    public function allInformation()
    {
        $information = informationModel::all();
        return view('categoriesForm', compact('information'));
    }

    public function showRelated(Request $request)
    {
        $information = informationModel::where('user_id', Auth::id())->get();

        return view('related', compact('information'));
    }

    public function allInterests(Request $request)
    {
        $interests = $request->interests;

        Session::put('interests', $interests);

        return redirect()->route('describing');

    }

    public function interests()
    {
        $interests = [
            'Linguistic intelligence',
            'Logical-mathematical intelligence',
            'Visual-spatial intelligence',
            'Musical intelligence',
            'Bodily-kinesthetic intelligence',
            'Interpersonal intelligence',
            'Intrapersonal intelligence',
            'Naturalistic intelligence'
        ];

        return view('interests', compact('interests'));
    }
    public function describe(Request $request)
    {
        $describe = Session::get('interests') ?? [];

        $intelligenceDescription = [
            'Linguistic intelligence' => 'The ability to use words effectively, both in writing and speaking.',
            'Logical-mathematical intelligence' => 'Ability to think logically, reason, and solve mathematical problems.',
            'Visual-spatial intelligence' => 'Ability to visualize and manipulate objects in space.',
            'Musical intelligence' => 'Ability to understand and create music, recognize rhythms and patterns.',
            'Bodily-kinesthetic intelligence' => 'Skill in using your body to express ideas or solve problems.',
            'Interpersonal intelligence' => 'Ability to understand and interact effectively with others.',
            'Intrapersonal intelligence' => 'Capacity to understand yourself, your thoughts and feelings.',
            'Naturalistic intelligence' => 'Ability to recognize and categorize plants, animals, and nature.',
        ];

        $selected = [];

        foreach($describe as $interest)
        {
            $selected[$interest] = $intelligenceDescription[$interest];
        }
        return view('describe', compact('describe', 'selected'));
    }

    public function quiz()
    {

        $intelligences = [
            'linguistic',
            'logical',
            'spatial',
            'bodily',
            'musical',
            'interpersonal',
            'intrapersonal',
            'naturalistic',
        ];

        return view('quiz', compact('intelligences'));

    }

    public function quizStarted(Request $request)
    {


        $answers = [
            'linguistic' => 12.5,
            'logical' => 12.5,
            'spatial' => 12.5,
            'bodily' => 12.5,
            'musical' => 12.5,
            'interpersonal' => 12.5,
            'intrapersonal' => 12.5,
            'naturalistic' => 12.5,
        ];

        $selected = $request->input('intelligences', []);

        $count = 0;

        foreach($selected as $intelligence)
        {
            $count += $answers[$intelligence];
        }

        return view('quizStarted', compact( 'count'));

    }
}
