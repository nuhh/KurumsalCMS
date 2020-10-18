<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use App\Models\BackendUsers;
use Illuminate\Database\Schema\Blueprint;
use App\Models\Modules;
use App\Models\Pages;
use App\Models\Slugs;

class PagesController extends Controller
{

	public function index()
	{
		$data['all'] = Pages::all();

		return view('system.pages.index', $data);
	}

	public function create()
	{
		return view('system.pages.create');
	}

	public function store()
	{
		$category = Pages::create([
			'title' => request('title'),
			'slug' => request('slug'),
			'content' => request('content'),
		]);

		Slugs::create([
			'slug' => request('slug'),
			'type' => 'page',
			'id' => $category['id']
		]);

		return redirect()->route('page.index');
	}

	public function edit($id)
	{
		$data['get'] = Pages::find($id);

		return view('system.pages.edit', $data);
	}

	public function update($id)
	{
		Pages::find($id)->update([
			'title' => serialize(request('title')),
			'slug' => serialize(request('slug')),
			'seo_keywords' => serialize(request('seo_keywords')),
			'seo_description' => serialize(request('seo_description')),
			'content' => serialize(request('content')),
			'extra' => serialize(request('extra')),
		]);

		return redirect()->route('pages');
	}

	public function destroy($id)
	{
		Pages::find($id)->delete();

		return redirect()->route('page.index');
	}
}