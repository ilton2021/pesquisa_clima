<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Auth;
use App\Models\Unidade;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class UserController extends Controller
{
	public function __construct(Unidade $unidade)
	{
		$this->unidade = $unidade;
	}
	
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }
	
	public function telaLogin()
	{
		$text = false;
		return view('auth.login', compact('text'));
	}

	public function telaRegistro()
	{
		$text = false;
		return view('auth.register', compact('text'));
	}
	
	public function telaEmail()
	{
		return view('auth.passwords.email');
	}
	
	public function telaReset()
	{
		$token = '';
		return view('auth.passwords.reset', compact('token'));
	}
	
	public function Login(Request $request)
	{
		$input = $request->all(); 		
		$validator = Validator::make($request->all(), [
			'email'    => 'required|email',
            'password' => 'required'
		]);		
		if ($validator->fails()) {

			return view('auth.login', compact())
			->withErrors($validator)
            ->withInput(session()->flashInput($request->input()));

		} else {
			$email = $input['email'];
			$senha = $input['password'];		
			$user = User::where('email', $email)->get();
			$qtd = sizeof($user); 			
			if ( empty($qtd) ) {

				$validator = "Logín inválido, verifique os campos e preencha novamente!";
				return view('auth.login', compact())
				->withErrors($validator)
				->withInput(session()->flashInput($request->input()));

				} else {
				$unidades = $this->unidade->all();
				Auth::login($user);
				return view('home', compact('unidades','user')); 						
			}
		}
	}
	
	public function resetarSenha(Request $request)
	{
		$input = $request->all();		
		$validator = Validator::make($request->all(), [
			'email'    => 'required|email',
            'password' => 'required|same:password_confirmation',
			'password_confirmation' => 'required'
    	]);		
		if ($validator->fails()) {
			
			return view('auth.passwords/reset', compact())
			->withErrors($validator)
			->withInput(session()->flashInput($request->input()));

		} else {
			if(!empty($input['password'])){ 
				$input['password'] = Hash::make($input['password']);
			}else{
				$input = array_except($input,array('password'));    
			}
			$email = $input['email'];
			$user = User::find(5);
			$user->update($input);
			$unidades = $this->unidade->all();
			$validator = "Senha Alterada com Sucesso!";
			return view('home', compact('unidade','user'))
			->withErrors($validator)
			->withInput(session()->flashInput($request->input()));						
		}
	}
	
    public function store(Request $request)
    {
		$input = $request->all();
		$validator = Validator::make($request->all(), [
			'name'     		   => 'required',
            'email'    		   => 'required|email|unique:users,email',
            'password' 		   => 'required|same:password_confirmation',
			'password_confirmation' => 'required'
    	]);			 
		if ($validator->fails()) {
		
			return view('auth.register', compact())
			->withErrors($validator)
			->withInput(session()->flashInput($request->input()));

		} else {
			$input['password'] = Hash::make($input['password']);
			$user = User::create($input);
			$unidades = $this->unidade->all();
			$validator = "Usuário Cadastrado com Sucesso!";
			return view('welcome', compact('unidades'))
			->withErrors($validator)
			->withInput(session()->flashInput($request->input()));
		}
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.edit',compact('user','roles','userRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

	public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}