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
            'password' => ['required', 'string', 'min:8'],
        ]);
            User::create([
                'nombre' => $request['nombre'],
                'apelPat' =>  $request['apelPat'],
                'apelMat'=> $request['apelMat'],
                'usuario' => $request['usuario'],
            'email' => $request['mail'],
                'password' => Hash::make($request['password']),
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
    
        public function userList(){
            $users = User::paginate();
    
            return view('vistas.userList',compact('users'));
        }
    
        public function userEdit($id){
            $user = User::find($id);
            $roleN = $user->getRoleNames();
            //  return $roleN;
            $roles = Role::all();
            // return $user;
            return view('vistas.editUser',compact('user','roles','roleN'));
        }
    
        public function userUpdate(Request $request ,User $user ){
    
            $user->nombre = $request->nombre;
            $user->apelPat = $request->apelPat;
            $user->apelMat = $request->apelMat;
    
            $user->save();
            $user->syncRoles($request['roles']);
        return redirect()->route('userList');
        }
    
        public function userUpdatePassword(Request $request){
            User::where('id',$request['id'])->update(['password' => Hash::make($request['contraseña'])]);
        return redirect()->route('userEdit',$request->id);
        }
    
        public function userDelete($id){
            User::where('id',$id)->update(['estatus' => '0']);
            return redirect()->route('userList');
        }
        public function userActive($id){
            User::where('id',$id)->update(['estatus' => '1']);
            return redirect()->route('userList');
        }
    
    
        public function busqueda(Request $request){
            
            $users = User::where('nombre','LIKE','%'.$request['busqueda'].'%')->orWhere('usuario','LIKE','%'.$request['busqueda'].'%')->paginate();
    
            return view('userList',compact('users'));
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
    
        public function crearPermiso(Request $request){
            Permission::create(['name' => $request['name']]);
    
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
