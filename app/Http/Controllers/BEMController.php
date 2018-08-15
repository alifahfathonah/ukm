<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\News;
use App\Model\InputBahasa;
use App\Model\BahasaValidasi;
use App\Model\BemBahasa;
class BEMController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:bem');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = news::orderby('id','DESC')->get();
        return view('bem.home', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    // Khusus Controller UKM BAHASA
    public function Bahasa()
    {
        $InputBahasa = InputBahasa::Where('status','Baru')->where('user','BEM')->OrderBy('id','Desc')->get();
        return view('bem.Bahasa.bahasa',compact('InputBahasa'));
    }

    public function arsipBhs()
    {
        $ArsipBhsAcc = BemBahasa::where('status','Disetujui')->orderBy('id','Desc')->LIMIT('3')->get();
        $ArsipBhsRev = BemBahasa::where('status','Revisi')->orderBy('id','Desc')->LIMIT('3')->get();
        $ArsipBhsDelay = BemBahasa::where('status','Menunggu')->orderBy('id','Desc')->LIMIT('3')->get();
        return view('bem.Bahasa.arsipBhs',compact('ArsipBhsAcc','ArsipBhsRev','ArsipBhsDelay'));
    }
}
