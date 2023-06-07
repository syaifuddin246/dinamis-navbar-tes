<?php

namespace App\Http\Controllers;

use App\Models\KatMenu;
use App\Models\SubMenu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $submenu=SubMenu::select('id','judul','gambar','id_katmenu','isi','slug','created_at')->latest()->paginate(10);
        return view('admin/submenu/index',compact('submenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $katmenu=KatMenu::select('id','menunav',)->get();
        return view('admin/submenu/create',compact('katmenu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi 
        $Validate=$request->validate([
            'judul'=>'required',
            // 'gambar'=>'requred|max:2000|mimes:jpg,jpeg,png,',
            'id_katmenu'=>'required',
            'isi'=>'required',
        ],
        [
            // mengubah notif eror ke bahasa indo
            'judul.required'=>'Judul Sub Menu Wajib Di isi',
            // 'gambar.required'=>'File Gambar Harus Di Isi',
            // 'gambar.max'=>'Ukuran File Gambar Harus 3Mb',
            // 'gambar.mimes'=>'Extention File Gambar (jpg,png,jpeg)',
            'id_katmenu.required'=>'Kategori Menu Harus Di Isi',
            'isi.required'=>'Isi Konten Wajib Di Isi',
        ]
    );
        $file = Request()->gambar;
        $filename = time() . '-' . $file->getClientOriginalName();
        $file->storeAs('storage/imgSubmenu',$filename);

        SubMenu::create([
            'judul'=>$request->judul,
            'gambar'=>$filename,
            'id_katmenu'=>$request->id_katmenu,
            'isi'=>$request->isi,
            'slug'=>Str::slug($request->judul,'-'),
        ]);

        return redirect('admin/submenu');
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
        $submenu=SubMenu::select('id','judul','gambar','isi','slug','id_katmenu')->whereId($id)->first();
        $katmenu=KatMenu::select('id','nama')->get();

        return view('admin/submenu/edit',compact('submenu','katmenu'));
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
        $Validate=$request->validate([
            'judul'=>'required',
            // 'gambar'=>'requred|max:2000|mimes:jpg,jpeg,png,',
            'id_katmenu'=>'required',
            'isi'=>'required',
        ],
        [
            // mengubah notif eror ke bahasa indo
            'judul.required'=>'Judul Sub Menu Wajib Di isi',
            // 'gambar.required'=>'File Gambar Harus Di Isi',
            // 'gambar.max'=>'Ukuran File Gambar Harus 3Mb',
            // 'gambar.mimes'=>'Extention File Gambar (jpg,png,jpeg)',
            'id_katmenu.required'=>'Kategori Menu Harus Di Isi',
            'isi.required'=>'Isi Konten Wajib Di Isi',
        ]
    );
        $data=[
            'judul'=>$request->judul,
            'id_katmenu'=>$request->id_katmenu,
            'isi'=>$request->isi,
            'slug'=>Str::slug($request->judul,'-'),
        ];
    // proses delete dan update gambar
        $submenu=SubMenu::select('id','gambar')->whereId($id)->first();
        if($request->gambar){
            unlink('storage/imgSubmenu/' .$submenu->gambar);

            // proses create gambar new
            $file= Request()->gambar;
            $filename=time() . '-' . $file->getClientOriginalName();
            $file->storeAs('storage/imgSubmenu', $filename);

            $data['gambar']=$filename;
        }
        $submenu->update($data);

        return redirect('admin/submenu');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // perintah delete
        $submenu=SubMenu::select('id','gambar')->whereId($id)->firstOrFail();
        if($submenu->gambar){
            unlink('storage/imgSubmenu/' .$submenu->gambar);
        } 
        $submenu->delete();
        return redirect('admin/submenu');       
        
    }
}
