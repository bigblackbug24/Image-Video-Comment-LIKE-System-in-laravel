<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Images;
use App\Videos;
use App\Status;
use App\Data;
use Carbon\Carbon;
use DB;
use Auth;
use App\Comments;
use App\Likes;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $all_data = DB::table('users')
            ->leftjoin('data', 'users.id', '=', 'data.user_id')
            ->orderBy('data_id','desc')
            ->get();

        // $all_data = DB::table('data')
        //     ->leftjoin('likes', 'data.data_id', '=', 'likes.likes_data_id')
        //     ->leftjoin('users', 'data.user_id', '=', 'users.id')
        //     ->orderBy('data.data_id','desc')
        //     ->get();
     
        $comments = DB::table('comments')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->join('data', 'data.data_id', '=', 'comments.data_id')
            ->orderBy('comment_id','asc')
            ->get();
        $cur_user = Auth::user()->id;

        $likes=DB::table('likes')->get();
                     // ->select(DB::raw('count(*) as likes, likes_data_id'))
                     // // ->where('status', '<>', 1)
                     // ->groupBy('likes_data_id')
                     // ->get();
            // echo "<pre>";
            // print_r($likes);
            // die();

        return view('home', compact('all_data', 'comments','cur_user','likes'));
    }

    public function about()
    {
        return view('about');
    }
    public function services()
    {
        return view('services');
    }
    public function contect()
    {
        return view('contect');
    }
    public function upload() {
      // getting all of the post data
      $file = array('image' => Input::file('image'));
      // setting up rules
      $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
      // doing the validation, passing post data, rules and the messages
      $validator = Validator::make($file, $rules);
      if ($validator->fails()) {
        // send back to the page with the input data and errors
        return Redirect::to('/services')->withInput()->withErrors($validator);
      }
      else {
        // checking file is valid.
        if (Input::file('image')->isValid()) {
          $destinationPath = 'images'; // upload path
          $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
          $fileName = rand(11111,99999).'.'.$extension; // renameing image
          Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
          //   echo "<pre>";
          // print_r($fileName);
          // die();
          if (Input::hasFile('image')) {
            Data::create(array(
                    'image'    => $destinationPath."/".$fileName,
                    'data_status' => 0,
                    'status_date' => Carbon::now(),
                    'user_id'   => Auth::user()->id
                ));
                     // sending back with message
          Session::flash('success', 'Upload successfully'); 
          return Redirect::to('/services');
           }
        
 
        }
        else {
          // sending back with error message.
          Session::flash('error', 'uploaded file is not valid');
          return Redirect::to('/services');
        }
      }
    }
    public function Video_upload() {
      // getting all of the post data
      $file = array('video' => Input::file('video'));
      // setting up rules
      $rules = array('video' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
      // doing the validation, passing post data, rules and the messages
      $validator = Validator::make($file, $rules);
      if ($validator->fails()) {
        // send back to the page with the input data and errors
        return Redirect::to('/services')->withInput()->withErrors($validator);
      }
      else {
        // checking file is valid.
        $extension = Input::file('video')->getClientOriginalExtension();
        if (Input::file('video')->isValid() && $extension == 'mp4') {
          $destinationPath = 'videos'; // upload path
           // getting image extension
          $fileName = rand(11111,99999).'.'.$extension; // renameing image
          Input::file('video')->move($destinationPath, $fileName); // uploading file to given path
          //   echo "<pre>";
          // print_r($fileName);
          // die();
          if (Input::hasFile('video')) {
            Data::create(array(
                    'video'    => $destinationPath."/".$fileName,
                    'status_date' => Carbon::now(),
                    'data_status' => 0,
                    'user_id'   => Auth::user()->id
                ));
                     // sending back with message
          Session::flash('success1', 'Upload successfully'); 
          return Redirect::to('/services');
           }
        
 
        }
        else {
          // sending back with error message.
          Session::flash('error1', 'uploaded file is not valid');
          return Redirect::to('/services');
        }
      }
    }

    public function Status_upload() {
        $status = array('status' => Input::get('status'));
        // setting up rules
        $rules = array('status' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($status, $rules);
        if ($validator->fails()) {
        // send back to the page with the input data and errors
            return Redirect::to('/services')->withInput()->withErrors($validator);
        }
        else {
            Data::create(array(
                    'status_name'    => Input::get('status'),
                    'data_status' => 0,
                    'status_date' => Carbon::now(),
                    'user_id'   => Auth::user()->id
                ));
                     // sending back with message
            Session::flash('success2', 'Upload successfully'); 
            return Redirect::to('/services');
        }
    }
    public function Post_Comment() {

        $comment = array('comment' => Input::get('comment'),'data_id' => Input::get('data_id'));
        // setting up rules
        $rules = array('comment' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($comment, $rules);
        if ($validator->fails()) {
        // send back to the page with the input data and errors
            return Redirect::to('/services')->withInput()->withErrors($validator);
        }
        else {
            Comments::create(array(
                    'comment'    => Input::get('comment'),
                    'data_id' => Input::get('data_id'),
                    'comment_date' => Carbon::now(),
                    'user_id'   => Auth::user()->id,
                    'comment_status' => 0
                ));
                     // sending back with message
            Session::flash('comment_msg', 'Post successfully'); 
            return Redirect::to('/home')->with('comment_msg','Post successfully');
        }
    }
    public function post_up(Request $request)
    {   
        // echo "<pre>";
        // print_r(Input::all());
        // die();
        $like_user = Input::get('user');
        $data_id = Input::get('data_id');
        $like = new Likes;
        $like->liked_by = $like_user;
        $like->likes_data_id = $data_id;
        $like->save();
    }
    public function Delet_Like(){
        // $inputs = Input::all();
        $del=Likes::where('liked_by',Auth::user()->id)
            ->where('likes_data_id', Input::get('data_id'))
            ->delete();
    }
}
