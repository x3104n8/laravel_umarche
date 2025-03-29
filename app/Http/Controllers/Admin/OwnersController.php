<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;  // SHINYA EDIT
use App\Models\Owner; // Eloquent エロクアント  // SHIYA EDIT
use Illuminate\Support\Facades\DB; // QueryBuilder クエリビルダ  // SHINYA EDIT
use Carbon\Carbon;

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
        // 以下はテストコード //SHINYA EDIT
        $date_now = Carbon::now();
        $date_parse = Carbon::parse(now());
        echo $date_now->year . '<br>';
        echo $date_parse . '<br>';

        $e_all = Owner::all();
        $q_get = DB::table('owners')->select('name', 'created_at')->get();
        // $q_1st = DB::table('owners')->select('name')->first();
        // $c_tst = collect (['name' => 'てすと']);
        // var_dump($q_1st);
        // dd($e_all, $q_get, $q_1st, $c_tst);
        return view('admin.owners.index',  compact('e_all', 'q_get'));
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
