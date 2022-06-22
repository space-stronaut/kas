<?php

namespace App\Http\Controllers;

use App\Models\TbPengeluaran;
use App\Models\TbRekening;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluarans = TbPengeluaran::all();

        return view('pengeluaran.index', compact('pengeluarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rekenings = TbRekening::all();

        return view('pengeluaran.create', compact('rekenings'));
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

        TbPengeluaran::create($data);
        TbRekening::find($request->rekening_id)->update([
            'uang' => $rekening->uang - $request->jumlah_pengeluaran
        ]);

        return redirect()->route('pengeluaran.index');
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
        $pengeluaran = TbPengeluaran::find($id);
        $rekening = TbRekening::find($pengeluaran->rekening_id);
        TbRekening::find($pengeluaran->rekening_id)->update([
            'uang' => $rekening->uang + $pengeluaran->jumlah_pengeluaran
        ]);

        $pengeluaran->delete();

        return redirect()->back();
    }
}
