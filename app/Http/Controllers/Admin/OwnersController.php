<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;  // SHINYA EDIT

class OwnersController extends Controller implements HasMiddleware  // SHINYA EDIT
{
    // SHINYA ADD START
    // コントローラミドルゥエアの実装(Laravel12)
    public static function middleware(): array{
        return ['auth:admin'];
    }
    // コントローラミドルゥエアの実装(Laravel8)
    //public function __construct(){
    //    $this->middleware('auth:admin');
    // }
    // SHINYA ADD END:w

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd('オーナー一覧です');
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
