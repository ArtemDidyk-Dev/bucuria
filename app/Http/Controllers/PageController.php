<?php

namespace App\Http\Controllers;

use App\Http\Requests\CareerRequest;
use App\Models\Career;
use App\Models\Standart;
use Illuminate\Http\Request;

class PageController extends Controller
{
	public function index()
	{
		return view('pages.index', []);
	}

	public function standart($slug = '')
	{

		$pageModel = new Standart();

		$page = $pageModel->getBySlug($slug);

		if (empty($page)) {
			abort(404);
		}

		return view('pages.standart', [

			'page' => $page
		]);
	}

	public function aboutUs()
	{
		return view('pages.aboutus', []);
	}

	public function findus()
	{
		return view('pages.find-us', []);
	}

	public function history()
	{
		return view('pages.history', []);
	}


	public function career()
	{
		return view('pages.career', []);
	}

	public function send_contact(CareerRequest $r)
	{
		$data = $r->validated();
		$data['date'] = date('Y-m-d H:i:s');

		$file = $data['file'] ?? '';

		if(!empty($file)) {
			$upload_path = "files/2/career/";
			if ($file != null) {
				$file_name = time().rand(0, 9999).".".$file->getClientOriginalExtension();
				$file->move($upload_path, $file_name);
				$data['file'] =  "/".$upload_path.$file_name;
			}
		} else {
			$data['file'] = '';
		}

		$career = new Career($data);
		$career->save();

		return $this->response([]);
	}

	public function contact()
	{
		return view('pages.contacts', []);
	}

	public function certificates()
	{
		return view('pages.certificates', []);
	}

	public function suppliers()
	{
		return view('pages.suppliers', []);
	}
}
