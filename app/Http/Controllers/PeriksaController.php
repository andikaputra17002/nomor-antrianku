<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Riwayat;
use App\Models\JamPraktek;
use App\Models\pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class PeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dokter = Dokter::with('pendaftaran')->get();
        $jampraktek = JamPraktek::all();
        $data = Riwayat::query();
        if ($request->fildok != null) {
            $data = $data->where('dokter_id', $request->get('fildok'));
        }
        if ($request->filjam != null) {
            $data = $data->where('jam_praktek_id', $request->get('filjam'));
        }
        $data = $data->whereDate('tanggal_pendaftaran', Carbon::today())->get();
        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('aksi', function ($data) {
                    $button = " <button class='edit edit-jam btn btn-primary  feather icon-edit-1' id='" . $data->id . "' > Edit</button>";
                    return $button;
                })
                ->addColumn('user_id', function($data) {
                    return $data->user->name;
                })
                ->addColumn('dokter_id', function($data) {
                    return $data->dokter->nama_dokter;
                })
                ->addColumn('jam_praktek_id', function($data) {
                    return $data->jam_praktek->jam_praktek;
                    // return $data->jam_praktek->jam_praktek_malam;
                })
                ->addColumn('status', function($data) {
                    return $data->status ? 'Sudah Datang' : 'Tdk Datang';
                })
                ->addColumn('created_at', function($data) {
                    return $data->created_at->format('H:i:s');
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->make(true);
                //
        }
        return view('riwayat.index',compact('dokter', 'jampraktek'));
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
        if ($pendaftaran = pendaftaran::where('antrian', $request->antrian)->first()){
            $pendaftaran = $pendaftaran->toArray();
            unset($pendaftaran['id']);
            $pendaftaran['status'] = true;
            Riwayat::create($pendaftaran);
            if ($pendaftaran) {
                return response()->json(['status' => 'Data Berhasil Disimpan', 200]);
            } else {
                return response()->json(['text' => 'Data Gagal Disimpan', 422]);
            }
        }
        return response()->json(['text' => 'Data Gagal Disimpan', 422]);
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
        $data = Riwayat::find($id);
        if($data){
            return response()->json($data);
        }
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
        $data= Riwayat::find($request->id);
        $data->status = $request->status;
        
        $data->update();
        return response()->json([
			'status' => 200,
		]);
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
