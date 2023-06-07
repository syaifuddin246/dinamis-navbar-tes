<?php

namespace App\Http\Controllers;

use App\Models\KatMenu;
use App\Models\MenuItem;
use App\Models\SubMenu;
use App\Models\SubMenuItem;
use App\Models\SubMenuItem1;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $submenuitem1=SubMenuItem1::select('id','nama','link')->where('status','enable')->get();
        $submenuitem=SubMenuItem::select('id','nama','link')->where('status','enable')->get();
        $menuitem=MenuItem::select('id','nama','link')->where('status','enable')->get();
        // $submenu=SubMenu::select('id','judul','gambar','id_katmenu','isi','slug','created_at')->get();
        // $katmenu=KatMenu::select('menunav','slug')->orderBy('menunav','asc')->get();
        return view('front/home',compact('menuitem','submenuitem','submenuitem1'));
    }
    // fungsi baca detail isi 
    public function detailsubmenu($slug)
    {
        $subkonten=SubMenu::select('id','judul','gambar','id_katmenu','isi','slug','created_at')->whereId('slug',$slug)->firstOrfail();

        return view('front/bacasubmenu/detail',compact('subkonten'));
    }

    // fungsi kategori submenu
    public function katsubmenu($slug){
        $katmenu=KatMenu::select('id')->where('slug',$slug)->firstOrFail();
        $subkonten=SubMenu::select('id','judul','gambar','isi','slug','created_at')->where('id_katmenu',$katmenu->id)->latest();
        
        return view('front/bacasubmenu/katmenu',compact('katmenu','subkonten'));
    }
    public function kontak()
    {
        //
        $submenuitem=SubMenuItem::select('id','nama','link')->where('status','enable')->get();
        $menuitem=MenuItem::select('id','nama','link')->where('status','enable')->get();
        return view('front/kontak',compact('submenuitem','menuitem'));
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
        //
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
