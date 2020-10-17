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

		} else {
			// kurulum yapılmamışsa yönlendirmeleri ekleyelim
            Route::middleware('web')
                ->namespace('App\Http\Controller')
                ->group(base_path('routes/setup.php'));
		}
	}
}
