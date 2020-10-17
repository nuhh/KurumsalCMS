<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class ModuleServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// kurulum yapılıp yapılmadığının kontrolünü
		// bu dosya üzerinden sağlayacağız
		if(file_exists(base_path('isInstalled'))) {

			$this->loadRoutes();

		} else {
			// kurulum yapılmamışsa yönlendirmeleri ekleyelim
            Route::middleware('web')
                ->namespace('App\Http\Controllers')
                ->group(base_path('routes/setup.php'));
		}
	}

	protected function loadRoutes()
	{
		Route::group([
			'middleware' => 'web',
			'namespace' => 'App\Http\Controllers'
		], function() {
			Route::get('system/login', 'SystemController@loginPage')->name('login');
			Route::post('system/login', 'SystemController@login');

			Route::group([
				'middleware' => 'isLoggedIn'
			], function() {
				Route::get('system' , 'SystemController@index')->name('system');
				Route::get('system/modules' , 'SystemController@modules')->name('modules');

				Route::get('system/logout', 'SystemController@logout')->name('logout');
			});
		});
	}
}
