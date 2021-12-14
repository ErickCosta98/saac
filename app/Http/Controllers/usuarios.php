<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        ]);
        $usuario = Helper::userGenerator(new User,'usuario',2,'USR');
            User::create([
                'nombre' => $request['nombre'],
                'apelPat' =>  $request['apelPat'],
                'apelMat'=> $request['apelMat'],
                'usuario' => $usuario,
            ])->syncRoles($request['roles']);
            return redirect()->route('userRegistro')->with('success','Nuevo usuario:'.$usuario);
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
            if($credenciales['password'] == '20212022'){
            return redirect()->route('welcome')->with('alert','Tienes una contraseña por defecto por favor cambiala!');
            }
            
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
            
            if($request->listas == 'Admin'){
                $users = DB::select('select users.*,roles.name as role from users inner join roles inner join model_has_roles on users.id != ? and users.estatus="1" and model_has_roles.model_id = users.id and  roles.id = model_has_roles.role_id', [Auth::user()->id]);
                // $a = User::;
            // return $users;
            return datatables()->of($users)->toJson();                
            }else{
                $users = DB::select('select users.*,roles.name as role from users inner join roles inner join model_has_roles on users.id != ? and users.estatus="1" and roles.name = ? and model_has_roles.model_id = users.id and  roles.id = model_has_roles.role_id', [Auth::user()->id,$request->listas]);
                  
                // $a = User::;
            // return $users;
            return datatables()->of($users)->toJson();
            }
        }
    
        public function userEdit($id,$listas){
            // return $id;
            $user = User::find($id);
            $roleN = $user->getRoleNames();
            //  return $roleN;
            $roles = Role::all();
            // return $user;
            return view('vistas.editUser',compact('user','roles','roleN','listas'));
        }
    
        public function userUpdate(Request $request ,User $user ){
            $request->validate(['nombre' => ['required', 'string', 'max:255'],
            'apelPat' => ['required', 'string', 'max:255'],
            'apelMat' => ['required', 'string', 'max:255'],
        ]);
            $user->nombre = $request->nombre;
            $user->apelPat = $request->apelPat;
            $user->apelMat = $request->apelMat;
            // $user->email = $request->email;
            $user->save();
            $user->syncRoles($request['roles']);
        return redirect()->route('usuarios',['listas'=>$request->listas])->with('success','cambios guardados');
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
            $request->validate(['nombre' => ['required', 'string', 'max:255'],
            'apelPat' => ['required', 'string', 'max:255'],
            'apelMat' => ['required', 'string', 'max:255'],
        ]);
            $user->nombre = $request->nombre;
            $user->apelPat = $request->apelPat;
            $user->apelMat = $request->apelMat;
            // $user->email = $request->email;
            $user->save();
            // $user->syncRoles($request['roles']);
        return back()->with('success','cambios guardados');
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

        public function passwordReset(Request $request){
            // return $request;
            User::where('id',$request['id'])->update(['password' => Hash::make('20212022')]);
        return back()->with('success','Se completo el cambio de contraseña');
        }
    
        public function userDelete(Request $request){
            //  return $request->id;
            // User::where('id',$request->id)->update(['estatus' => '0']);
            $user = User::find($request->id);
            $user->estatus = '0';
            $user->save();
             return response()->json($user);
        }
        public function userActive($id,$listas){
            // return $id;
            User::where('id',$id)->update(['estatus' => '1']);
            return redirect()->route('usuarios.index',['listas'=>$listas,'busqueda'=>'']);

        }
    
    
        
        public function roles(){
            $roles= Role::where('name','!=','admin')->get();
    
            return view('vistas.roleList',compact('roles'));
    
        }
        public function crearRol(Request $request){
            $role = Role::create(['name' => $request['name']]);
    
            $role->syncPermissions($request['permisos']);
    
            return redirect()->route('rolespermisos');
        }
    
        public function editRol($id){
            $role = Role::find($id);
            $permN =  $role->getPermissionNames();
            $permisos = Permission::where('name','!=','home')->where('name','!=','userAdmin')->get();
            // return $role->id;
            // return $permN;
            // return $permisos;
            return view('vistas.editRole',compact('role','permN','permisos'));
        }
    
        public function updateRol(Request $request){
            $arr = [];
            $arr = $request->nameP;
            array_push($arr,'home');
            // return $arr;
            // Role::where('id',$request->id)->update(['name' => $request->name ]);
            $role = Role::find($request->id);
    
            $role->syncPermissions($arr);
            return back()->with('success','cambios guardados');
        }
        


}
