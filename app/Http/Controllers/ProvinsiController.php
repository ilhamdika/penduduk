<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kataKunci = $request->kataKunci;
        $jumlahBaris = 4;
        if (strlen($kataKunci)) {
            $data = Provinsi::where('nama_provinsi', 'LIKE', "%$kataKunci")
                ->orWhere('nama_provinsi', 'LIKE', "%$kataKunci%")
                ->paginate($jumlahBaris);
            $data->appends($request->all());
        } else {
            $data = Provinsi::orderBy('id', 'desc')->paginate($jumlahBaris);
        }
        $data = Provinsi::orderBy('id', 'desc')->paginate($jumlahBaris);
        return view('Penduduk.Provinsi.Index')->with('dataProvinsi', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Penduduk.Provinsi.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama_provinsi', $request->nama_provinsi);
        $request->validate([
            'nama_provinsi' => 'required',
        ], [
            'nama_provinsi.required' => 'Nama Wajib diisi'
        ]);

        $data = [
            'nama_provinsi' => $request->nama_provinsi
        ];

        Provinsi::create($data);
        return redirect()->to('provinsi')->with('succes', 'Berhasil');
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
        $data = Provinsi::where('id', $id)->first();
        return view('Penduduk.Provinsi.Edit')->with('dataProvinsi', $data);
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
            'nama_provinsi' => 'required',
        ], [
            'nama_provinsi.required' => 'Nama Wajib diisi'
        ]);
        $data = [
            'nama_provinsi' => $request->nama_provinsi
        ];
        Provinsi::where('id', $id)->update($data);
        return redirect()->to('provinsi')->with('succes', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Provinsi::where('id', $id)->delete();
        return redirect()->to('provinsi')->with('succes', 'Berhasil');
    }
}
