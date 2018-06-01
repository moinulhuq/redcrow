<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Post;
use App\Http\Requests\StorePost;
use Illuminate\Support\Facades\DB;
use PHPJasper\PHPJasper;

class PostController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $jasper = new PHPJasper();
    $input = public_path(). '/rpt/hello_world.jrxml';

    $jasper = new PHPJasper;
    $jasper->compile($input)->execute();

    $input = public_path(). '/rpt/hello_world.jasper';
    $output = public_path(). '/rpt/examples';

    $options = [
      'format' => ['pdf', 'rtf']
    ];

    $jasper1 = new PHPJasper;

    $jasper1->process(
      $input,
      $output,
      $options
    )->execute();

//    dd($jasper);

//    $sp = DB::select('call sp_get_user()');
//
//    dd($sp);

    $Posts = Post::all();

    return view('general.index', compact('Posts'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('general.post');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StorePost $request)
  {

    Post::create([
      'title' => request('title'),
      'body' => request('body'),
      'published' => request('published')? true: false,
    ]);

    return redirect('/post');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Post $Post)
  {

    return view('general.show', compact('Post'));

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }

}
