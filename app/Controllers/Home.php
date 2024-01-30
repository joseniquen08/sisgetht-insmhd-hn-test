<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        foreach (auth()->user()->getGroups() as $value) {
            $group = $value;
        }
        $data = [
            'group' => $group,
        ];
        return view('home', $data);
    }
}
