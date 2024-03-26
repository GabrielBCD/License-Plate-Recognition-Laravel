<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $admin = Auth()->user()->name;
        try {
            $name = $request->input('name');
            $user = new User([
                'name' => $name,
                'usertype' => $request->input('usertype'),
                'email' => $request->input('email'),
                'password' => Hash::make(substr($request->email, 0, strpos($request->email, '@'))),
            ]);
            $user->save();
            Log::channel('users_log')->info("Admin $admin create user $name ");
            return redirect()->back()->with('success', 'Usuário criado com sucesso!');
        } catch (\Exception $e){
            Log::channel('users_log')->info("Admin $admin fail create user");
            return redirect()->back()->with('error', 'Ocorreu um erro ao criar o usuário: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user_type = $user->usertype;
            $new_type = $request->input('usertype_edit');
            $user->usertype = $new_type;
            if (!($user_type == $new_type)){
                $user->save();
                Log::channel('users_log')->info("User $user->name changed from $user_type to $new_type");
                return redirect()->back()->with('success', 'Usuário editado com sucesso');
            }
            return redirect()->back()->with('success', 'Nunhema alteração foi feita');


        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Ocorreu um erro ao alterar Usuário' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Auth()->user()->name;
        try {
            $user = User::findOrFail($id);
            $username = $user->name;
            Log::channel('users_log')->info("Admin $admin delete user $username");
            $user->delete();
            return redirect()->back()->with('success', 'Usuário excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao excluir o usuário: ' . $e->getMessage());
        }
    }
}
