<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Provinsi;
use Illuminate\Support\Facades\Session;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataPenduduk = Penduduk::with(['kabupaten', 'provinsi'])->orderBy('id', 'desc')->paginate(4);
        $provinsi = Provinsi::orderBy('nama_provinsi', 'asc')->get();
        $kabupaten = Kabupaten::orderBy('nama_kabupaten', 'asc')->get();
        return view('Penduduk.Index', compact('dataPenduduk', 'provinsi', 'kabupaten'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::orderBy('nama_provinsi', 'asc')->get();
        $kabupaten = Kabupaten::orderBy('nama_kabupaten', 'asc')->get();
        return view('Penduduk.Create', compact('provinsi', 'kabupaten'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('nik', $request->nik);
        Session::flash('alamat', $request->alamat);
        Session::flash('provinsi_id', $request->provinsi_id);
        Session::flash('kabupaten_id', $request->kabupaten_id);
        Session::flash('jenis_kelamin', $request->jenis_kelamin);
        Session::flash('tanggal_lahir', $request->tanggal_lahir);
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|max:18|unique:penduduks,nik',
            'alamat' => 'required',
            'provinsi_id' => 'required',
            'kabupaten_id' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required'
        ], [
            'nama.required' => 'Nama Wajib diisi',
            'nik.required' => 'NIK Wajib diisi',
            'nik.unique' => 'NIK sudah terdaftar',
            'nik.max' => 'NIK maksimal 18 karakter',
            'alamat.required' => 'Alamat Wajib diisi',
            'provinsi_id.required' => 'Provinsi Wajib diisi',
            'kabupaten_id.required' => 'Kabupaten Wajib diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib diisi'
        ]);
        $data = [
            'nama' => $request->nama,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'provinsi_id' => $request->provinsi_id,
            'kabupaten_id' => $request->kabupaten_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir
        ];
        // return $data;
        Penduduk::create($data);
        return redirect()->route('penduduk.index')->with('success', 'Data Penduduk berhasil ditambahkan');
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
        $dataPenduduk = Penduduk::where('id', $id)->first();
        $provinsi = Provinsi::orderBy('nama_provinsi', 'asc')->get();
        $kabupaten = Kabupaten::orderBy('nama_kabupaten', 'asc')->get();
        return view('Penduduk.Edit', compact('dataPenduduk', 'provinsi', 'kabupaten'));
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
            'nama' => 'required',
            'nik' => 'required|max:18',
            'alamat' => 'required',
            'provinsi_id' => 'required',
            'kabupaten_id' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required'

        ], [
            'nama.required' => 'Nama Wajib diisi',
            'nik.required' => 'NIK Wajib diisi',
            'nik.max' => 'NIK maksimal 18 karakter',
            'alamat.required' => 'Alamat Wajib diisi',
            'provinsi_id.required' => 'Provinsi Wajib diisi',
            'kabupaten_id.required' => 'Kabupaten Wajib diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib diisi'

        ]);

        $data = [
            'nama' => $request->nama,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'provinsi_id' => $request->provinsi_id,
            'kabupaten_id' => $request->kabupaten_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir
        ];
        Penduduk::where('id', $id)->update($data);
        return redirect()->route('penduduk.index')->with('success', 'Data Penduduk berhasil diubah');
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
