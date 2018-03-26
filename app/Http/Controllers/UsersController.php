<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Entities\Role;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function index()
    {
        $this->authorize('users.index');
        $users = User::paginate();
        $roles = Role::all()->pluck('name', 'id');

        return view('users.index', compact('users', 'roles'));
    }

    public function edit($id)
    {
        $this->authorize('users.edit');
        $user = User::where('id',$id)->first();

        $role = $user->roles->first();


        $roles = Role::all();

        return view('users.edit',compact('user','roles','role'));

    }
    public function update(Request $request, $id)
    {
        $this->authorize('users.update');
        $data = array();

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['updated_at'] = date('y-m-d');

        if ($request->file('imagepath')){
            $image = Storage::disk('public')->put("/images", $request->file('imagepath') );
            $data['imagepath'] = $image;
        }

        User::where('id',$id)->update($data);

        $response = [
            'message' => 'Usuário Atualizado',
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->route('users.index')->with('message', $response['message']);

    }
    public function store(Request $request)
    {
        $image = Storage::disk('public')->put("/images", $request->file('imagepath') );
        $this->authorize('users.store');
        $data = $request->all();
        //codeverification
        $data['verification_code'] = $this->generateCode();
        $data['password'] = bcrypt('mudarsenha');
        $data['imagepath'] = $image;
        //usercreate
        $user = User::create($data);
        //$user->notify(new CreateUser($user));
        //user_role
        $user_role = \App\Entities\RoleUser::create([
            'user_id' => $user->id,
            'role_id' => $data['user']['role_id']
        ]);

        $response = [
            'message' => 'Usuário cadastrado',
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->route('users.index')->with('message', $response['message']);

    }

    private function generateCode(){
        return \str_random(30);
    }
}
