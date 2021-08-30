<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:page-list|page-create|page-edit|page-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:page-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:page-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:page-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Page::paginate(18);
        return view('admin.pages.view', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.pages.add');
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
                'title' => 'required',
                'body'  => 'required',
            ],
            [
                'title.required' => trans('Pages.title_ar_error'),
                'body.required'   => trans('Pages.body_ar_error'),
            ]
        );
        $request->show_mobile = ($request->show_mobile == 'on') ? true : false;
        Page::create([
            'title' => $request->title,
            'body' => $request->body,
            'show_mobile' => $request->show_mobile,
        ]);


        return redirect('admin/pages');
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
        $data = Page::find($id);

        return view('admin.pages.edit', ['data' => $data]);
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
                'title' => 'required',
                'body'  => 'required',
            ],
            [
                'title.required' => trans('Pages.title_ar_error'),
                'body.requied'   => trans('Pages.body_ar_error'),
            ]
        );


        $data = Page::find($id);
        $data->show_mobile = ($request->show_mobile == "on") ? true : false;
        $data->title  = $request->title;
        $data->body   = $request->body;
        // return $data;
        $data->save();

        return redirect('admin/pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Page::find($id);
        $data->delete();
        return redirect('admin/pages');
    }
}
