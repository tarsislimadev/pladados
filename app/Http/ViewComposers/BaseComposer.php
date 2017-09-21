<?php

namespace App\Http\ViewComposers;

use \Illuminate\View\View;

class BaseComposer {

    /**
     * Create a new composer.
     *
     * @return void
     */
    public function __construct() {
    }
    
    public function create(View $view) {
    }

    public function compose(View $view) {
    }

}
