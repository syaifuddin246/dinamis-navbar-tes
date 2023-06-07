<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\SubMenuItem;
use App\Models\SubMenuItem1;
use Illuminate\Http\Request;

class SubMenuItem1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $submenuitem1=SubMenuItem1::select('id','nama','menu_item_id','submenu_item1_id','link','status')->latest()->paginate(10);

        return view('admin/submenuitem1/index',compact('submenuitem1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $menuitem=MenuItem::where('status','enable')->get();
        $submenuitem1=SubMenuItem::where('status','enable')->get();
        return view('admin/submenuitem1/create',compact('submenuitem1','menuitem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validate=$request->validate([
            'nama'=>'required',
            'menu_item_id'=>'required',
            'submenu_item1_id'=>'required',
            'link'=>'required',
            'status'=>'required',
        ],
        [
            'nama.required'=>'Nama Sub Menu Tidak Boleh Kosong',
            'menu_item_id.required'=>'Menu Tidak Boleh Kosong',
            'submenu_item1_id.required'=>'Kategori Sub Menu Tidak Boleh Kosong',
            'link.required'=>'Link Konten Sub Menu Tidak Boleh Kosong',
            'status.required'=>'Status Tidak Boleh Kosong'
        ]
    );
    SubMenuItem1::create([
        'nama'=>$request->nama,
        'menu_item_id'=>$request->menu_item_id,
        'submenu_item1_id'=>$request->submenu_item1_id,
        'link'=>$request->link,
        'status'=>$request->status,
    ]);

    return redirect('admin/submenuitem1');
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
