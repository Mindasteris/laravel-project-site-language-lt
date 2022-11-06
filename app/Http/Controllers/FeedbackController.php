<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Use Model
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $feedbacks = Feedback::all(); // This show all records from DB, but not working for pagination, because on every page it shows all records
        $feedbacks = Feedback::paginate(5);
        // $paginate = DB::table('feedback')->paginate(5);
        return view('feedback', ['feedbacks' => $feedbacks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feedback');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required|max:30',
            'title' => 'required|max:100',
            'message' => 'required|max:255',
        ],
        [
            'name.required' => 'Šis laukas yra privalomas',
            'title.required' => 'Šis laukas yra privalomas',
            'message.required' => 'Šis laukas yra privalomas',
        ]
    );

        // Insert in database
        $feedbacks = Feedback::create($request->all());

        // Success Message
        return back()->with('feedback', 'Jūsų atsiliepimas sėkmingai patvirtintas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedbacks = Feedback::find($id);
        return view('feedback', ['feedbacks' => $feedbacks]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feedbacks = Feedback::find($id);
        return view('edit-feedback', ['feedbacks' => $feedbacks]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $feedbacks = Feedback::find($id);
        $feedbacks->name = $request->name;
        $feedbacks->title = $request->title;
        $feedbacks->message = $request->message;
        $feedbacks->update();
        return redirect('/atsiliepimai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedbacks = Feedback::find($id);
        $feedbacks->delete();
        return redirect('/atsiliepimai');
    }
}
