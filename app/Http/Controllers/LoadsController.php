<?php

namespace App\Http\Controllers;

class LoadsController extends Controller {

    public function index() {
        $loads = \App\Load::query()->get();
        return view('loads.index', \compact('loads'));
    }

    public function create() {
        return view('loads.create');
    }

    public function save() {
        $request = \Request::all();
        
        $load = null;
        if (isset($request['id']) && $request['id']) {
            $load = \App\Load::query()->where('id', $request['id'])->first();
        } else {
            $load = new \App\Load();
        }
        
        $load->fill($request);
        $load->user_id = $this->getUserSessionId();
        
        if ($load->save()) {
            return ['status' => 'OK', 'id' => $load->id];
        } else {
            return ['status' => 'NOK'];
        }
    }
    
}
