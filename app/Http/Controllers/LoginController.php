<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    public function index(){
        return view('login.index') ;
    }

    public function register(){
        return view('login.register') ;
    }


public function  save (Request $request ){
$request->validate([
'name'=>'required',
'email'=>'required|email|unique:admins',
'password'=>'required|min:5|max:12'

]);
$admin= new Admin;
$admin->name=$request->name;
$admin->email=$request->email;
$admin->password=Hash::make($request->password);
$save=$admin->save();
if($save){
return back ()->with('success','Nouveau Utilisateur Ajouter avec Succes');
}else{
    return back()->with('error','réessayez');
}
}
public function check(Request $request){
    $request->validate([
        
        'email'=>'required|email',
        'password'=>'min:5|max:12'
        
        ]);
        $userdata=Admin::where('email','=',$request->email)->first();
        if(!$userdata){
            return back()->with('fail',"cet email n'existe pas ");
        }else{
            if (Hash::check($request->password, $userdata->password)) {
                $request->session()->put('loggeed',$userdata->id);
                return redirect('/home');
              
            }else{
                return back()->with('fail', 'Mot de passe incorrect');
            }
        }
        
}


public function logout(){
    if(session()->has('loggeed')){
        session()->pull('loggeed');
        return redirect('/');
    }
}
}
