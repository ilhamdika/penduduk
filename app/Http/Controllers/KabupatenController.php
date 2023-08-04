<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use Illuminate\Support\Facades\Session;
use App\Models\Kabupaten;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kabupaten::with(['provinsi'])->orderBy('id', 'desc')->paginate(4);
        return view('Penduduk.Kabupaten.Index')->with('dataKabupaten', $data);
        // return($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::orderBy('nama_provinsi', 'asc')->get();
        return View('Penduduk.Kabupaten.Create', compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama_kabupaten', $request->nama_kabupaten);
        Session::flash('provinsi_id', $request->provinsi_id);
        $request->validate([
            'nama_kabupaten' => 'required',
            'provinsi_id' => 'required'
        ], [
            'nama_kabupaten.required' => 'Nama Wajib diisi',
            'provinsi_id.required' => 'Provinsi Wajib diisi'
        ]);
        $data = [
            'nama_kabupaten' => $request->nama_kabupaten,
            'provinsi_id' => $request->provinsi_id
        ];
        Kabupaten::create($data);
        return redirect()->route('kabupaten.index')->with('success', 'Data Kabupaten berhasil ditambahkan');
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
        $dataKabupaten = Kabupaten::where('id', $id)->first();
        $provinsi = Provinsi::orderBy('nama_provinsi', 'asc')->get();
        return view('Penduduk.Kabupaten.Edit', compact('dataKabupaten', 'provinsi'));
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
        $request->validate([
            'nama_kabupaten' => 'required',
            'provinsi_id' => 'required'
        ], [
            'nama_kabupaten.required' => 'Nama Wajib diisi',
            'provinsi_id.required' => 'Provinsi Wajib diisi'
        ]);
        $data = [
            'nama_kabupaten' => $request->nama_kabupaten,
            'provinsi_id' => $request->provinsi_id
        ];
        Kabupaten::where('id', $id)->update($data);
        return redirect()->route('kabupaten.index')->with('success', 'Data Kabupaten berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kabupaten::where('id', $id)->delete();
        return redirect()->route('kabupaten.index')->with('success', 'Data Kabupaten berhasil dihapus');
    }
}
