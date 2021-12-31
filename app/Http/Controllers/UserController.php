<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index(Request $request){

    $allUser =   User::all();
    return view('index',compact('allUser'));

    }




    public function CreateUser(Request $request){

        $data = [
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=> $request->password,

        ];

        $validator =  Validator::make($request->all(),[
            'name'=>'required|min:3',
            'email'=>'required|unique:users|email',
            'password'=>'required|min:3|confirmed',
        ]);
        
        if ($validator->fails()) {
            return redirect('/')->withErrors($validator->errors());
        }else{
            if($request->hasFile('image')){
                $uploadFile = $request->file('image');
                $file_name = $uploadFile->hashName();
                $uploadFile->storeAs('public/src/images', $file_name);
                $data['avatar']=$file_name;
            }
            User::create($data);
            return redirect('/')->with(['success' => 'Record Added Successfully!']);
        }
    }

     public function getUserData($id){
        $userData = User::find($id);
        return view('editUser',compact('userData','id'));
    }

    function UpdateUser(Request $request){
       
       
        // $data = [
        //     "name"=> $request->name,
        //     "email"=> $request->email,
        //     "password"=> $request->password,

        // ];



        $validator =  Validator::make($request->all(),[
            'name'=>'required|min:3',
            'email'=>'required|unique:users|email',
            'password'=>'sometimes|required|min:6|confirmed' 
        ]);
 
        return $validator->errors();
        
        // if ($validator->fails()) {
        //     return redirect('/editUser/'.$request->id)->withErrors($validator->errors());
        // }else{
        //     if($request->hasFile('image')){
        //         $uploadFile = $request->file('image');
        //         $file_name = $uploadFile->hashName();
        //         $uploadFile->storeAs('public/src/images', $file_name);
        //         $data['avatar']=$file_name;
        //     }
        //     User::create($data);
        //     return redirect('/editUser/'.$request->id)->with(['success' => 'Record Added Successfully!']);
        // }

            // if($request){

            // }
            

            // if($request->password !==null){
              
            // }
           
    }
    
}
