<?php

namespace App\Http\Controllers;
use App\Exports\CashierExport;
use App\Models\Cashier;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Session;



class CashierController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = Cashier::all();
            $data = Cashier::where('nama','LIKE','%' .$request->search.'%')->paginate(10);
            // Session::put('halaman_url',request()->fullUrl());
        } else {
            $data = Cashier::orderBy('qty','desc')->paginate(10);
            // Session::put('halaman_url',request()->fullUrl());
                }
            return view('daftarpesanan',compact('data'));
        
    }
    public function tambahpesanan(){
        return view('tambahpesanan');
    }
    public function insertdata(Request $request){
       $data = Cashier::create($request->all());
        $this->validate($request, [
            'nama' => 'required|min:3|max:40',
            'qty' => 'required|min:1|max:3',
        ]);
        return redirect()->route('cashiers')->with('success', 'Data Pesanan Berhasil ditambahkan');
    }
    
    public function tampildata($id){
        $data = Cashier::find($id);
        //dd($data);
        return view('tampildata',compact('data'));
    }
    public function updatedata(Request  $request, $id){
        $data = Cashier::find($id);
        $data->update($request->all());
        return redirect()->route('cashiers')->with('success','Data Pesanan Berhasil diUpdate');
    }
    public function delete($id){
        $data = Cashier::find($id);
        $data->delete();
        return redirect()->route('cashiers')->with('success','Data Pesanan Berhasil diHapus');

    }
    public function exportexcel(){
        return Excel::download(new CashierExport,'datapesanan.xlsx');
    }
    public function admin(){
        return view('layout.admin');
    }
    public function dashboard(){
        return view('dashboard');
    }
    public function home(){
        return view('home');
    }


}
