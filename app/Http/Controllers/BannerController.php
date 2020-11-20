<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller{
    public function index(){
        // TITLE
        view()->share('title', 'Listado de Banners Activos');

        $banners = Banner::where('status', '=', 1)
                    ->orderBy('id', 'DESC')
                    ->get();

        return view('admin.banners.index')->with(compact('banners'));
    }

    public function store(Request $request){
        $banner = new Banner($request->all());

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $name = $banner->id.".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/images/banners', $name);
            $banner->image = $name;
        }

        $banner->save();

        return redirect('admin/banners')->with('msj-exitoso', 'El banner ha sido creado con éxito.');
    }

    public function update(Request $request){
        $banner = Banner::find($request->banner_id);
        $banner->fill($request->all());

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $name = $banner->id.".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/images/banners', $name);
            $banner->image = $name;
        }

        $banner->save();

        return redirect('admin/banners')->with('msj-exitoso', 'El banner ha sido modificado con éxito.');
    }

    public function change_status($id, $status){
        $banner = Banner::find($id);
        $banner->status = $status;
        $banner->save();

        if ($status == 0){
            return redirect('admin/banners')->with('msj-exitoso', 'El banner '.$banner->title.' ha sido deshabilitado con éxito.');
        }else{
            return redirect('admin/banners/disabled')->with('msj-exitoso', 'El banner '.$banner->title.' ha sido habilitado con éxito.');
        }
    }

    public function disabled(){
        // TITLE
        view()->share('title', 'Listado de Banners Inactivos');

        $banners = Banner::where('status', '=', 0)
                    ->orderBy('id', 'DESC')
                    ->get();

        return view('admin.banners.disabled')->with(compact('banners'));
    }
}
