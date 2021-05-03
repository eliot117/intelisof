<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $user = User::get();
        return view('api.users.index', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'           => 'required|max:80',
            'lastname'       => 'required|max:80',
            'email'          => 'required|email|unique:users,email',
            'password'       => 'required|min:8|confirmed',
            //'rol'            => 'required|array',
        ]);

        $request->request->add([
            'password' => bcrypt($request->password)
        ]);

        $user = User::create($request->all());

        $user->assignRole('Solicitante');

        //Asignar rol dependiendo del select en la vista
        $roles = Role::find($request->roles);

        $roles->each(function($role) use($user) {
            $user->assignRole($role);
        });

        return redirect()->route('users.index')->with('success','Usuario creado');
    }

    public function show($id)
    {
        $user = User::FindOrFail($id);
        return $user;
    }


    public function update(Request $request, $id)
    {
        $this->validate(request(),
        ['name'     => ['required','max:50']],
        ['lastname' => ['required','max:50']],
        ['email'    => ['required', 'email', 'max:90', 'unique:users,email,'.$id]],
        ['avatar'   => ['required', 'image']],
       // ['rol'      => ['required']],
        ['password' => ['confirmed']
        ]);

        $users = User::findOrFail($id);

        $users->name     = $request->get('name');
        $users->lastname = $request->get('lastname');
        $users->email    = $request->get('email');

        $file = $request->get('profile');

        if($file != null or $request->hasFile('profile'))
        {
            $fileNameWithTheExtension = request('profile')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
            $extension = request('profile')->getClientOriginalExtension();
            $newFileName = $fileName . '_' . time() . '.' . $extension;
            $path = request('profile')->storeAs('public/profile', $newFileName);
            $users->profile   = $newFileName;
        }
        else
        {
            unset($users->profile);
        }

        $pass = $request->get('password');

        if($pass != null )
        {
            $users->password= bcrypt($request->get('password'));
        }
        else
        {
            unset($users->password);
        }

        $users->update();

        return redirect('users')->with('Datos Actualizados Correctamente');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();
        return $user;
    }
}
