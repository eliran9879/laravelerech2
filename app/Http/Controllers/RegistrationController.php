<?php  

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;


class RegistrationController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('registration.create');
    }
    public function store(Request $request)
    {
        
        $this->validate(request(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $user = User::create(request(['name', 'email', 'password']));
        
        auth()->login($user);
        
        return redirect()->to('/home');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //

    }
    public function update(Request $request, $id)
    {
     //
    }
    public function destroy($id)
    {
        //
    }
}