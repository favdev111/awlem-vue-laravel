<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FaqAdmin;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FaqAdmin::paginate(18);
        return view('admin.faq.view', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.faq.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  $request->validate(
            [
                'question' => 'required',
                'answer'   => 'required',
            ],
            [
                'question.required' => trans('Faq.question_ar_error'),
                'answer.required'   => trans('Faq.answer_ar_error'),
            ]
        );
        $request->active = ($request->active == 'on') ? true : false;
        FaqAdmin::create([
            'question' => $request->question,
            'answer'   => $request->answer,
            'active'   => $request->active,
        ]);


        return redirect('admin/faq');
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
        $data = FaqAdmin::find($id);

        return view('admin.faq.edit', ['data' => $data]);
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
        $validator =  $request->validate(
            [
                'question' => 'required',
                'answer'   => 'required',
            ],
            [
                'question.required' => trans('Faq.question_ar_error'),
                'answer.required'   => trans('Faq.answer_ar_error'),
            ]
        );
        $data = FaqAdmin::find($id);

        $data->question  = $request->title;
        $data->answer    = $request->answer;
        $data->active    = $request->active;

        $data->save();

        return redirect('admin/faq');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = FaqAdmin::find($id);
        $data->delete();
        return redirect('admin/faq');
    }
}
