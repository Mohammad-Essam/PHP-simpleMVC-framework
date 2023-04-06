<?php
require('bootstrap.php');
class initController
{
    // public $title = "loling hard is better than loling low";

    public function index()
    {
        return view('initView',
            ['variable' => 'value on the variable of init Controller']);
    }
}