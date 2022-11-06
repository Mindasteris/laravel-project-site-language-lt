<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Need to use Model 'ContactUs' for insert data in database
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contactus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $this->validate($request,
        [
            'name' => 'required|max:30',
            'email' => 'required|email',
            'title' => 'required|max:100',
            'message_content' => 'required',
        ],
        [
            'name.required' => 'Šis laukas yra privalomas',
            'email.required' => 'Šis laukas yra privalomas',
            'title.required' => 'Šis laukas yra privalomas',
            'message_content.required' => 'Šis laukas yra privalomas',
        ]
    );

        // Insert in DB
        //$DB_data = $request->all();
        ContactUs::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'title' => $request->title,
                'message_content' => $request->message_content,
            ]
        );

        // Success Message
        return back()->with('success', 'Ačiū, jūsų žinutė gauta. Susisieksime kaip įmanoma greičiau.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
