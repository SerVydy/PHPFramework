<?php

    namespace App\Controllers;


    class HomeController
    {
        public function index()
        {
            return view('test',['name' => 'John Doe'],);
        }

        public function test()
        {
            return app()->view->render('test',['name' => 'John Doe test']);
        }

        public function test2()
        {
            return 'test2';
        }
        
    }