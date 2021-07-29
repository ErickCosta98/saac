<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException as ValidationValidationException;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class usuarios extends Controller
{
    //
    public function userRegistro(){
        $roles = Role::all();
        return view('vistas.userRegistro',compact('roles'));
    }
    
        public function gUser(Request $request){
            // return $request;
            $request->validate(['nombre' => ['required', 'string', 'max:255'],
            'apelPat' => ['required', 'string', 'max:255'],
            'apelMat' => ['required', 'string', 'max:255'],
            'usuario' => ['required', 'string', 'max:20', 'unique:users'],
        ]);
            User::create([
                'nombre' => $request['nombre'],
                'apelPat' =>  $request['apelPat'],
                'apelMat'=> $request['apelMat'],
                'usuario' => $request['usuario'],
                'email' => $request['mail'],
            ])->syncRoles($request['roles']);
            return redirect()->route('userRegistro');
        }
    
        public function authLog(Request $request){
            $credenciales = $request->validate([
                'usuario' => ['required', 'string', 'max:20'],
                'password' => ['required', 'string', 'min:8'],
            ]);
            $status =   User::select()->where('usuario',$credenciales['usuario'])->value('estatus');
            if($status!=1){
                throw ValidationValidationException::withMessages([
                    'usuario' => __('auth.failed')
                ]);
            }else{
            if(Auth::attempt(['usuario' => $credenciales['usuario'], 'password' => $credenciales['password']])){
            
            $request->session()->regenerate();
            
            return redirect()->route('welcome');
            }
        }
            throw ValidationValidationException::withMessages([
                'usuario' => __('auth.failed')
            ]);
            
        }
    
        public function logout(Request $request){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Auth::logout();
    
            return redirect('/');
        }
    
        public function index(Request $request){
            $auth = User::find(Auth::user()->id);
            $users = "";
            $roleN = $auth->getRoleNames();
            if($request->listas == 'Admin' && strpos($roleN,'Admin')){
                    $users = User::where('id','!=',$auth->id)->get(); 
                //    return $users;
            return view('vistas.userList',compact('users'));
            }else{
                $users = User::where('id','!=',$auth->id)->role($request->listas)->get();
            }
                            // $a = User::;
            // return $users;
            return view('vistas.userList',compact('users'));
            
        }
    
        public function userEdit($id,$listas){
            $user = User::find($id);
            $roleN = $user->getRoleNames();
            //  return $roleN;
            $roles = Role::all();
            // return $user;
            return view('vistas.editUser',compact('user','roles','roleN','listas'));
        }
    
        public function userUpdate(Request $request ,User $user ){
    
            $user->nombre = $request->nombre;
            $user->apelPat = $request->apelPat;
            $user->apelMat = $request->apelMat;
            $user->email = $request->email;
            $user->save();
            $user->syncRoles($request['roles']);
        return redirect()->route('usuarios.index',['listas'=>$request->listas]);
        }

        public function userEdit1($id){
            $user = User::find($id);
            $roleN = $user->getRoleNames();
            //  return $roleN;
            $roles = Role::all();
            // return $user;
            return view('vistas.editUserus',compact('user','roles','roleN'));
        }
    
        public function userUpdate1(Request $request ,User $user ){
    
            $user->nombre = $request->nombre;
            $user->apelPat = $request->apelPat;
            $user->apelMat = $request->apelMat;
            $user->email = $request->email;
            $user->save();
            $user->syncRoles($request['roles']);
        return back();
        }


    
        public function userUpdatePassword(Request $request){
            $password=User::where('id',$request['id'])->value('password');
            if(!Hash::check($request->actpass, $password) ){
                throw ValidationValidationException::withMessages([
                    'actpass' => __('auth.failed'),
                ]);
            }
            $request->validate([
                'newPass' => ['required', 'string', 'min:8'],
            ]);
            if($request->newPass != $request->conPass){
                throw ValidationValidationException::withMessages([
                    'conPass' => 'La nueva contraseña no coincide'
                ]);
            }
            // return 'HOLI';
           User::where('id',$request['id'])->update(['password' => Hash::make($request['newPass'])]);
        return redirect()->route('password')->with('info','Se completo el cambio de contraseña');
        }
    
        public function userDelete($id,$listas){
            // return $id;
            User::where('id',$id)->update(['estatus' => '0']);
            return redirect()->route('usuarios.index',['listas'=>$listas,'busqueda'=>'']);
        }
        public function userActive($id,$listas){
            // return $id;
            User::where('id',$id)->update(['estatus' => '1']);
            return redirect()->route('usuarios.index',['listas'=>$listas,'busqueda'=>'']);

        }
    
    
        
        public function roles(){
            $roles= Role::all();
    
            return view('vistas.roleList',compact('roles'));
    
        }
        public function crearRol(Request $request){
            $role = Role::create(['name' => $request['name']]);
    
            $role->syncPermissions($request['permisos']);
    
            return redirect()->route('rolespermisos');
        }
    
        public function editRol($id){
            $role = Role::find($id);
            $permN = $role->getPermissionNames();
            $permisos = Permission::all();
    
    
            return view('editRole',compact('role','permN','permisos'));
        }
    
        public function updateRol(Request $request){
            Role::where('id',$request->id)->update(['name' => $request->name ]);
            $role = Role::find($request->id);
    
            $role->syncPermissions($request['permisos']);
            return redirect()->route('rolespermisos');
        }
        


}
