<?php

namespace App\Http\ViewComposers;

use \Illuminate\View\View;

class LayoutDefaultComposer extends BaseComposer {

    public function create(View $view) {
        if (\Session::has('user')) {
            $session = \Session::get('user');
            $view->with('session_id', $session->id);
            $view->with('session_name', $session->name);
            $view->with('session_lastname', $session->lastname);
            $view->with('session_cpf', $session->cpf);
            $view->with('session_email', $session->email);
        }
    }

}
