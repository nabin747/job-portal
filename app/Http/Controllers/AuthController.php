<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request  $request)
    {
       try{
           $credentials = $request->only('username','password');
           if(Auth::attempt($credentials)){
               $user = Auth::user();
               $token = $user->createToken('test')->accessToken;
//            $token = Crypt::encrypt($user->createToken("mytoken")->accessToken);
               return response()->json(['token'=>$token],200);
           }else{
               return response()->json(['message'=>'invalid username or password']);
           }
       }catch (Exception $exception){
           return  response([
               'message'=>$exception->getMessage()
           ],400);
       }
    }

    public  function register(Rrequest $rrequest){

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
