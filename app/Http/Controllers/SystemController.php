<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use App\Models\BackendUsers;
use Illuminate\Database\Schema\Blueprint;
use App\Models\Modules;

class SystemController extends Controller
{

	public function activeModule($id)
	{
		Modules::find($id)->update([ 'is_active' => 1 ]);

		return redirect()->route('system');
	}

	public function deactiveModule($id)
	{
		Modules::find($id)->update([ 'is_active' => 0 ]);

		return redirect()->route('system');
	}

	public function modules()
	{
		$data['all'] = Modules::all();

		return view('system.modules', $data);
	}

	public function index()
	{
		return view('system.dashboard');
	}

	public function install()
	{
	    try {
	        \DB::connection()->getPdo();
	        $data['connection'] = true;
	    } catch (\Exception $e) {
	    	$data['connection'] = false;
	    }

		return view('system.start.install', $data);
	}

	public function setup()
	{
        Schema::create('backend_users', function($table) {
            $table->increments('id');
            $table->string('username', 1024);
            $table->string('password', 1024);
            $table->timestamps();
        });

        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('manage_url');
            $table->tinyInteger('is_loaded')->default(0);
            $table->tinyInteger('is_dropped')->default(0);
            $table->tinyInteger('is_needed_reflesh')->default(1);
            $table->tinyInteger('is_active')->default(0);
            $table->timestamps();
        });

        Modules::where('manage_url', 'Backend/System')->update([ 'is_active' => 1]);

        BackendUsers::create([
            'username' => request('username'),
            'password' => Hash::make(request('password'))
        ]);

        file_put_contents(base_path('isInstalled'), 'true');

        return redirect()->route('homepage');
	}

	public function loginPage()
	{
		return view('system.auth.login');
	}

	public function login()
	{
		$username = request('username');
		$password = request('password');

		$get = BackendUsers::where('username', $username)->first();
		if(Hash::check($password, $get['password'])) {
			session()->put('isLoggedIn', true);
			session()->put('userId', $get['id']);
			return redirect()->route('system');
		} else {
			return redirect()->route('login');
		}
	}

	public function logout()
	{
		session()->flush();
		session()->put('isLoggedIn', false);

		return redirect()->route('login');
	}

}