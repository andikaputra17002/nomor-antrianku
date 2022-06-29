<?php

namespace App\Http\Controllers;

use datatables;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PetugasController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = User::where('roles','ADMIN')->get();
        if (request()->ajax()) {
            return datatables()->of($petugas)
                ->addColumn('aksi', function ($data) {
                    $button = " <button class='edit edit-jam btn btn-primary  feather icon-edit-1' id='" . $data->id . "' > Edit</button>";
                    $button .= " <button class='hapus btn btn-outline-danger feather icon-trash' id='" . $data->id . "' > Hapus</button>";
                    return $button;
                })
                ->addColumn('photoProfile', 'petugas.photoProfile')
                ->rawColumns(['aksi', 'photoProfile'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('petugas.index');
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
            'name' => 'required',
            'email' => 'required',
            'password' =>'required',
            'alamat' => 'required',
            'roles' =>'required',
            'jenis_kelamin' => 'required',
            'no_tlp' => 'required',
            'photoProfile' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
        $text = [
            'name.required' => 'Kolom nama tidak boleh kosong',
            'email.required' => 'Kolom email tidak boleh kosong',
            // 'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Kolom password tidak boleh kosong',
            'alamat.required' => 'Kolom alamat tidak boleh kosong',
            'roles.required' => 'Kolom roles tidak boleh kosong',
            'jenis_kelamin.required' => 'Kolom janis kelamin tidak boleh kosong',
            'no_tlp.required' => 'Kolom nomor telepon tidak boleh kosong',
            'photoProfile.mimes' => 'Kolom image harus berupa file dengan jenis: jpeg, png, jpg',
            'photoProfile.image' => 'Kolom image harus berupa gambar'
        ];

        $validasi = Validator::make($request->all(), $rule, $text);
        if ($validasi->fails()) {
            return response()->json(['status' => 0, 'text' => $validasi->errors()->first()], 422);
        }

        $datas = new User();
        $Id = $request->id;
        $data =[
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => Hash::make($request->password),
            'password' => $request->password,
            'alamat' => $request->alamat,
            'roles' => $request->roles,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_tlp' => $request->no_tlp,
            
        ];
        if ($files = $request->file('photoProfile')) {
            //delete old file
            \File::delete('public/files/'.$request->hidden_image);
            
            //insert new file
            $destinationPath = 'public/files/'; // upload path
            $profileImage = time() . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $data['photoProfile'] = "$profileImage";
        }
         
        $datas = User::updateOrCreate(['id' => $Id], $data);

        if ($datas) {
            return response()->json(['status' => 'Data Berhasil Disimpan', 200]);
        } else {
            return response()->json(['text' => 'Data Gagal Disimpan', 422]);
        } 
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
         
        $data = User::find($id);
        if($data){
            return response()->json($data);
        }
        //  return response()->json($data);
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
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
			'status' => 200,
		]);
        
    }
}
