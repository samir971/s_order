<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\GeneralTrait;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    use GeneralTrait;
    public function register(Request $request)
    {
        $validatedData=Validator::make($request->all(),[
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|string|min:8',
            'mobile'=>'required|string|unique:users',
            'area_id'=>'required|exists:areas,id',
            'address'=>'required|string'
        ]);
        if ($validatedData->fails()){
            return $this->apiResponse(null,false,$validatedData->errors()->first(),400);
        }
       
        $user= User::create([
          'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'mobile' => $request->input('mobile'),
            'area_id'=>$request->input('area_id'),
            'address' => $request->input('address'),
            'notes'=>null,
            'packarge_id'=>null,
            'Expire'=>null,
            'active'=>false,
            'type'=>'user'
            
        ]);
        return response()->json(['message'=>'User register successfully'],201);
    }
    public function login(Request $request)
    {
        $validatedData=Validator::make($request->all(),
        ['email'=>'required|string|email',
            'password'=>'nullable|required_without:registration_method']);
      
        if($validatedData->fails()){
            return $this->requiredField($validatedData->errors()->first());
        }
        try{
            $user= User::where('email',$request->input('email'))
           
            ->first();
            if(!$user){
                return $this->apiResponse(null,false,'name or password not corrected',400);
            }
            if ($request->filled('password')) {
                if (!Hash::check($request->input('password'), $user->password)) {
                    return $this->apiResponse(null, false, 'Invalid email or password.', 400);
                }
            }
            $token=$user->createToken('apiToken')->plainTextToken;
            $data['user']=new UserResource($user);
            $data['token']=$token;
            $data['message']='user logged in successfully';
            return $this->apiResponse($data,true,null,200);

        }
        catch(\Exception $ex){
            return $this->apiResponse(null,false,$ex->getMessage(),500);
        }
       
    }
    public function logout(Request $request){
        try{
            $user=auth()->user();
            if($user){
                $user->tokens()->delete();
            }
            $data['massage']='user has logged out successfully';
            return $this->apiResponse($data,true,null,200);
        }
        catch(\Exception $ex){
            return $this->apiResponse(null,false,$ex->getMessage(),500);
        }
    }
}