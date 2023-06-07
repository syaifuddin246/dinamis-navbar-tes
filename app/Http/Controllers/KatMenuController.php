<?php

namespace App\Http\Controllers;


use App\Models\KatMenu;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class KatMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $katmenu=KatMenu::select('id','menunav','created_at')->latest()->Paginate(10);
        return view('admin/katmenu/index',compact('katmenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/katmenu/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'menunav' => 'required',
            ],
            [
                'menunav.required' => 'form wajib di isi'
            ]
        );

        KatMenu::create([
            'menunav' => $request->menunav,
            'slug' => $request->menunav, '-'
        ]);

        return redirect('/admin/katmenu');
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
        $katmenu=KatMenu::select('id','menunav','slug','created_at',)->whereId($id)->first();
        return view('/admin/katmenu',compact('katmenu'));
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
        $validate=$request->validate([
            'menunav'=>'required',
        ],
        [
            'menunav.required'=>'Nama Menu Wajib Di isi',
        ]
    );
        $data=([
            'menunav'=>$request->menu,
            'slug'=>Str::slug($request->menu,'-'),
        ]);

        KatMenu::updated($data);
        return redirect('admin/katmenu');
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
        KatMenu::deleted($id);
        return redirect('admin/katmenu');
    }
}
