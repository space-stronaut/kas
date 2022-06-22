<?php

namespace App\Http\Controllers;

use App\Models\TbPemasukan;
use App\Models\TbRekening;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasukans = TbPemasukan::all();

        return view('pemasukan.index', compact('pemasukans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rekenings = TbRekening::all();

        return view('pemasukan.create', compact('rekenings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $rekening = TbRekening::find($request->rekening_id);

        TbPemasukan::create($data);
        TbRekening::find($request->rekening_id)->update([
            'uang' => $rekening->uang + $request->jumlah_pemasukan
        ]);

        return redirect()->route('pemasukan.index');
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
        $pemasukan = TbPemasukan::find($id);
        $rekening = TbRekening::find($pemasukan->rekening_id);
        TbRekening::find($pemasukan->rekening_id)->update([
            'uang' => $rekening->uang - $pemasukan->jumlah_pemasukan
        ]);

        $pemasukan->delete();

        return redirect()->back();
    }
}
