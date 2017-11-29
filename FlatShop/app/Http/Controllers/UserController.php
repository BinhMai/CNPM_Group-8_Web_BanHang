<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Hash;
use Carbon\Carbon;
use File;
use Auth;
use Cookie;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $password = null;
        if(isset($_GET['id'])){            
            $user = User::where('userID',$_GET['id'])->first();
            $user->isActive = 0;     
        }else{
            if(isset($_GET['userID'])){
               $user = User::find($_GET['userID']);
               $user->typeofuser = $user->typeofuser;               
            }else{
                $user = new User;
                $user->userID = "rrrrr";
                $user->username = Input::get('username');
                $password = Input::get('password');
                $user->password = Hash::make(Input::get('password'));
                $user->email = Input::get('email');
                if(Auth::check() && Auth::user()->typeofuser == 1)
                    $user->typeofuser = Input::get('typeofuser');
            }

            if($_FILES['pictures']['name']!= ''){            
                $file = $_FILES['pictures']['name'];                              
                $user->mediaID = 'images/'.$file;

                if ( ! File::copy($_FILES['pictures']['tmp_name'],'images/'.$file))
                {
                    die("Couldn't copy file");
                }
            }         
            $user->firstname = Input::get('firstname');
            $user->lastname = Input::get('lastname');
            $user->telephone = Input::get('telephone');
            $user->address = Input::get('address');            
            $user->gender = Input::get('gender');
            $user->dateofbirth = Input::get('dateofbirth');            
            $user->dateofcreate  = Carbon::now()->toDateTimeString();
            $user->isActive = 1;    
        }                
        if($user->save()){
            if(!Auth::check()){                
                $name = $user->username;                   
                Auth::attempt(['username' => $name, 'password' => $password]);
            }
            $string = Input::get('url');
            $url = substr($string,16,strlen($string)-16);            
            return redirect(''.$url);                        
        }
    }

    public function login(Request $request){            
        $name = $_POST['user'];
        $password = $_POST['password'];        

        if (Auth::attempt(['username' => $name, 'password' => $password])) {
            if($_POST['update'] == 1){
                Order::where('userID',Cookie::get('user_ip'))->update(['userID' => Auth::id()]);
            }
            echo $_POST['oldurl'];
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
