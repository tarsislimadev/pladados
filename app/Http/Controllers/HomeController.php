<?php

namespace App\Http\Controllers;

class HomeController extends Controller {

    public function index() {
        return view('home.index');
    }
    
    public function signin() {
        return view('home.signin');
    }
    
    public function makeSignin() {
        $request = \Request::all();
        
        $user = \App\User::query()->where('email', $request['email'])->first();
        
        $this->encryptPassword($request);
        if ($request['password'] != $user->password) {
            return \redirect()->back()->withInput()->withErrors();
        }
        
        $this->createSession($user);
        return \redirect()->to('/');
    }
    
    public function signup() {
        return view('home.signup');
    }
    
    public function makeSignup() {
        $request = \Request::all();
        
        $user = new \App\User();
        $this->encryptPassword($request);
        $user->fill($request);
        
        if ($user->save()) {
            $this->createSession($user);
        } else {
            // TODO: retornar erros para tela anterior
        }
        
        return \redirect()->to('/');
    }
    
    public function signout() {
        \Session::flush();
        return \redirect()->to('/');
    }
    
    private function encryptPassword(&$data) {
        $data['password'] = \App\Utils\Str::encode($data['password']);
    }
    
    private function createSession(\App\User $user) {
        $session = new \stdClass();
        
        $session->id = $user->id;
        $session->name = $user->name;
        $session->lastname = $user->lastname;
        $session->cpf = $user->cpf;
        $session->email = $user->email;
        
        \Session::put('user', $session);
    }

}
