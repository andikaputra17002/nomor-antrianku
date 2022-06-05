<?php

namespace App\Http\Controllers;

// use App\Http\Requests\JamPraktekRequest;

use App\Models\hari_praktek;
use App\Models\HariPraktek;
use datatables;
use App\Models\JamPraktek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JamPraktekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $hari = HariPraktek::all();
        $data = JamPraktek::all();
        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('aksi', function ($data) {
                    $button = " <button class='edit edit-jam btn btn-primary  feather icon-edit-1' id='" . $data->id . "' > Edit</button>";
                    $button .= " <button class='hapus btn btn-outline-danger feather icon-trash' id='" . $data->id . "' > Hapus</button>";
                    return $button;
                })
                ->addColumn('hari_praktek_id', function($data) {
                    return $data->hari_praktek->hari_praktek;
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('jampraktek.index',compact('hari'));
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

        $rule = [
            'jam_praktek_pagi' => 'required',
            'jam_praktek_malam' => 'required',
            'hari_praktek_id' => 'required',
        ];
        $text = [
            'jam_praktek_pagi.required' => 'Kolom jam praktek pagi dokter tidak boleh kosong',
            'jam_praktek_malam.required' => 'Kolom jam praktek malam dokter tidak boleh kosong',
            'hari_praktek_id.required' => 'Kolom hari praktek dokter tidak boleh kosong'
        ];

        $validasi = Validator::make($request->all(), $rule, $text);
        if ($validasi->fails()) {
            return response()->json(['status' => 0, 'text' => $validasi->errors()->first()], 422);
        }

        $datas = new JamPraktek();
        $Id = $request->id;
        $data =[
            'jam_praktek_pagi' => $request->jam_praktek_pagi,
            'jam_praktek_malam' => $request->jam_praktek_malam,
            'hari_praktek_id' => $request->hari_praktek_id,
        ];
        // $data = $data->save();
        $datas = JamPraktek::updateOrCreate(['id' => $Id], $data);

        if ($datas) {
            return response()->json(['status' => 'Data Berhasil Disimpan', 200]);
        } else {
            return response()->json(['text' => 'Data Gagal Disimpan', 422]);
        }
        // return response()->json([
        //     	'status' => 200, $datas
        //     ]);
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

        $data = JamPraktek::find($id);
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
    public function update(Request $request)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = JamPraktek::where('id',$id)->delete();
     
        return response()->json($data);
    }
}
