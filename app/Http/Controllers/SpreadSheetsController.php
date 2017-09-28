<?php

namespace App\Http\Controllers;

class SpreadSheetsController extends Controller {

    public function index() {
        $sheets = \App\SpreadSheet::query()->get();
        return view('spreadsheets.index', \compact('sheets'));
    }

    public function create() {
        return view('spreadSheets.create');
    }

    public function save() {
        $request = \Request::all();
        
        $sheet = null;
        if (isset($request['id']) && $request['id']) {
            $sheet = \App\Spreadsheet::query()->where('id', $request['id'])->first();
        }
        
        if ($sheet === null) {
            $sheet = new \App\Spreadsheet();
        }
        
        $sheet->fill($request);
        $sheet->user_id = $this->getUserSessionId();
        
        if ($sheet->save()) {
            return ['status' => 'OK', 'id' => $sheet->id];
        } else {
            return ['status' => 'NOK'];
        }
    }
    
}
