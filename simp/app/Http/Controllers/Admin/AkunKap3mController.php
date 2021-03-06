<?php

namespace App\Http\Controllers\Admin;

use App\KaP3M;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AkunKap3mController extends Controller
{
    public function index()
    {
        $datas =KaP3M::all();
        return view('pages.admin.akun.kap3m.index', compact('datas'));
    }

    public function create()
    {
        return view('pages.admin.akun.kap3m.create');
    }

    public function store(Request $request)
    {
        $data= new KaP3M();
        $data->name = $request->nama;
        $data->email = $request->email;
        $data->nidn = $request->nidn;
        $data->password = Hash::make($request->nidn);
        $data->save();
        return redirect()->route('admin.kap3m.index');
    }
    public function edit($id)
    {
        $datas = KaP3M::find($id);
        return view('pages.admin.akun.kap3m.edit', compact('datas'));

    }

    public function update(Request $request, $id)
    {
        $data = new KaP3M();
        $data->name = $request->nama;
        $data->email =$request->email;
        $data->nidn =$request->nidn;
        if ($request->password != null){
            $data->password= Hash::make($request->password);
        }
        $data->save();
        return redirect()->route('admin.kap3m.index')->with('success', 'Berhasil');
    }
}
