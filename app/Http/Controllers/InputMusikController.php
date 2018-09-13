<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\InputMusik;
use App\Model\BemMusik;
use App\Model\KmhMusik;
use Storage;
class InputMusikController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:musik');
    }
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
        $inputmusikBem = InputMusik::all();
        return view('musik.inputBem', compact('inputmusikBem'));
    }

    public function createKmh()
    {
        $inputMusikKmh = InputMusik::all();
        return view('musik.inputKmh',compact('inputMusikKmh'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'     => 'nullable|max:100',
            'user'      =>  'required|min:2',
            'status'    =>  'required|min:2',
        ]);
    
        $uploadFile = $request->file('file');
        $path       = $uploadFile->store('public/files');
        $inputMusik = InputMusik::create([
            'title' => $uploadFile->getClientOriginalName(),
            'user'  => $request->user,
            'status'=> $request->status,
            'filename'=> $path
        ]);
    
        return redirect()->route('musik.home');
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
        $InputRevBem = BemMusik::findOrFail($id);
        return view('musik.inputBemRev', compact('InputRevBem'));
    }

    public function editKmh($id)
    {
        $inputKmh = BemMusik::findOrFail($id);
        return view('musik.inputKmh', compact('inputKmh'));
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

// Controller Download

    // BEM
    public function unduhBemMusik(BemMusik $unduhBemMusik)
    {
        return Storage::download($unduhBemMusik->filename, $unduhBemMusik->title);
    }
}
