<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use App\BackendUsers;
use Illuminate\Database\Schema\Blueprint;
use App\Modules;
use App\Pages;
use App\Slugs;

class PartsController extends Controller
{

	public function homepage()
	{
		return view('homepage');
	}
	
	public function hello( $one, $two = null, $three = null, $four = null, $five = null, $six = null, $seven = null, $eight = null, $nine = null, $ten = null, $eleven = null )
	{
		view()->share('one', $one);
		view()->share('two', $two);
		view()->share('three', $three);
		view()->share('four', $four);
		view()->share('five', $five);
		view()->share('six', $six);
		view()->share('seven', $seven);
		view()->share('eight', $eight);
		view()->share('nine', $nine);
		view()->share('ten', $ten);
		view()->share('eleven', $eleven);

		$find = Slugs::find($one);

		if( $find == null ) {
			// 404 salla
			return 'bu icerik yoohhh!';
		} else {
			if ( $find['type'] == 'blog' ) {
				return $this->blog( $one );
			} elseif( $find['type'] == 'blog-category' ) {
				return $this->blogCategory( $one, $two );
			} elseif( $find['type'] == 'page' ) {
				return $this->page( $one );
			} elseif( $find['type'] == 'product-category' ) {
				return $this->productCategory( $one, $two );
			} elseif( $find['type'] == 'product' ) {
				return $this->product( $one );
			}
		}
	}

	protected function product( $one )
	{
		return view('product');
	}

	protected function productCategory( $one, $two )
	{
		return view('product-category');
	}

	protected function page( $one )
	{
		return view('page');
	}

	protected function blog( $slug )
	{
		return view('blog');
	}

	protected function blogCategory( $slug, $page )
	{
		$page = ($page == null) ? 1 : $page;

		return view('blog-category');
	}

}