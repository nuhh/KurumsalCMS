<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

use App\Models\BackendUsers;


class SetupController extends Controller
{
	public function index()
	{
		if(request('step', 1) == 1) {
			return view('system.install.index');			
		} elseif(request('step') == 2) {
			return view('system.install.step2');
		}

	}

	public function install()
	{
		$username = request('username');
		$password = request('password');

        Schema::create('backend_users', function(Blueprint $table) {
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

        Schema::create('slugs', function (Blueprint $table) {
            $table->string('slug');
            $table->integer('type_id');
            $table->integer('id');
        });

        Schema::create('slug_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('method');
            $table->timestamps();
        });

        BackendUsers::create([
            'username' => $username,
            'password' => Hash::make($password)
        ]);

        file_put_contents(base_path('isInstalled'), 'true');

        return view('system.install.done');
	}

}