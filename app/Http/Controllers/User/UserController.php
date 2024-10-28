<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    // public function show($contentId)
    // {
        
    // }

    // public function create()
    // {
    //     return view('user.create');
    // }

    // public function store(Request $request)
    // {
        
    // }


    // public function edit(Review $review)
    // {
    //     return view('user.edit', compact('user'));
    // }

    // public function update(Request $request, $id)
    // {
    
    // }


    // public function destroy($id)
    // {
        
    // }

}
