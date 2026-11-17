<?php

namespace App\Http\Controllers;

class SapaController extends Controller
{
    public function index()
    {
        $nama = 'Manda Hardi Yanti';

        return view('pages.sapa', [
            'nama' => $nama,
        ]);
    }
}
