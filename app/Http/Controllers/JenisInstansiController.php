<?php

namespace App\Http\Controllers;

use App\jenis_instansi;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\DataTables;
use Session;
class JenisInstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request, Builder $builder)
    { 
        if ($request->ajax()) {
       $jenis_instansi = jenis_instansi::all();
        return Datatables::of($jenis_instansi)
                ->addColumn('action', function ($jenis_instansi) {  
                    return view('datatable._action', [
                    'model'=> $jenis_instansi,
                    'form_url'=> route('jenisinstansi.destroy', $jenis_instansi->id),
                    'edit_url' => route('jenisinstansi.edit',$jenis_instansi->id),
                    'confirm_message' => 'Yakin mau menghapus ' .$jenis_instansi->name . '?'
    
                ]);
                })->make(true);
    }
    $html = $builder
        ->addColumn(['data' => 'nama', 'name'=>'nama','title'=>'Jenis Instansi'])
    
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false,
                     'searchable'=>false]);
    return view('jenis_instansi.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('jenis_instansi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'nama' => 'required|'
                
            ]);
        $jenis_instansi = new jenis_instansi;
        $jenis_instansi->nama = $request->nama;
       
          $jenis_instansi->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$jenis_instansi->jenis_instansi</b>"
        ]);
        return redirect()->route('jenisinstansi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jenis_instansi  $jenis_instansi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jenis_instansi = jenis_instansi::findOrFail($id);
        return view('jenis_instansi.show',compact('jenis_instansi'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jenis_instansi  $jenis_instansi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                $jenis_instansi = jenis_instansi::findOrFail($id);

        return view('jenis_instansi.edit',compact('jenis_instansi'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jenis_instansi  $jenis_instansi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
                'nama' => 'required|'
            
                ]);
            $jenis_instansi = jenis_instansi::findOrFail($id);
            $jenis_instansi->nama = $request->nama;
        $jenis_instansi->save();
            Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil mengedit <b>$jenis_instansi->jenis_instansi</b>"
            ]);
            return redirect()->route('jenisinstansi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jenis_instansi  $jenis_instansi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = jenis_instansi::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('jenisinstansi.index');

}
}
