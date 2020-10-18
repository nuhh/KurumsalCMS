<?php

namespace App\Providers;

use App\Models\Modules;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PagesServiceProvider extends ServiceProvider
{
	var $name = 'Sayfalar';

	var $manageUrl = 'system/page';

	var $description = 'Sitesinde basit mantalitede blog sayfası oluşturmak paylaşmak isteyenler oluşturulmuştur.';

	var $version = '1.0.0';

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		if(file_exists(base_path('isInstalled'))) {
			$check = Modules::where('name', $this->name)->first();
			if($check === null) {
				Modules::create([
					'name' => $this->name,
					'manage_url' => $this->manageUrl,
					'is_active' => 0,
					'is_loaded' => 0,
					'is_needed_reflesh' => 0,
					'is_dropped' => 0
				]);
			}

			$moduleDetail = Modules::where('name', $this->name)->first();
			if($moduleDetail['is_active'] == 1) {
				if($moduleDetail['is_loaded'] == 0) {
					$this->loadModule();

					Modules::where('name', $this->name)->update([
						'is_loaded' => 1,
						'is_needed_reflesh' => 1,
						'is_dropped' => 0
					]);
				}

				if($moduleDetail['is_needed_reflesh'] == 1) {
					$moduleDetail->update([
						'is_needed_reflesh' => 0
					]);
				}

				if($moduleDetail['is_dropped'] == 1) {
					$this->dropModule();

					Modules::where('name', $this->name)->update([
						'is_loaded' => 0,
						'is_dropped' => 0,
						'is_needed_reflesh' => 1
					]);
				}

				$this->includeFiles();

				if(method_exists($this, 'loadRoutes')) $this->loadRoutes();
			} else {
				if($moduleDetail['is_loaded'] == 1) {
					$this->dropModule();

					Modules::where('name', $this->name)->update([
						'is_loaded' => 0,
						'is_dropped' => 0,
						'is_needed_reflesh' => 1
					]);
				}

				if($moduleDetail['is_needed_reflesh'] == 1) {
					$moduleDetail->update([
						'is_needed_reflesh' => 0
					]);
				}
			}
		}
	}

	protected function includeFiles()
	{
		//require __DIR__ . '/../Helpers/pages.php';
	}

	protected function loadModule()
	{
		Schema::create('pages', function($table) {
			$table->increments('id');
			$table->string('title', 1024);
			$table->string('slug', 1024);
			$table->text('content');
			$table->string('seo_description', 1024)->nullable();
			$table->string('seo_keywords', 1024)->nullable();
			$table->string('extra', 1024)->nullable();
			$table->timestamps();
		});
	}

	protected function dropModule()
	{
		Schema::drop('pages');
	}

	protected function loadRoutes()
	{
		Route::group([
			'middleware' => [ 'web', 'isLoggedIn' ],
			'prefix' => 'system',
			'namespace' => 'App\Http\Controllers'
		], function() {

			Route::resource('page', \PagesController::class);

		});
	}
}
