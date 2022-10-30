<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HashController extends Controller
{
    public function HashMaker($string){
        dd(Hash::check($string, '$2y$10$633DK/CyW9Ouf.TGifWrt.MVfOfoyJoZnGtDfK/oVmBY75WTeyU6W'),Hash::make($string));
    }
}
