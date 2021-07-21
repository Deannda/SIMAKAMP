<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use PDF;


class panduansuratController extends Controller
{

	public function cetakpanduansurat()
	{
		
		$view = \View::make('admindesa/panduansurat');

		$html_content = $view->render();

		PDF::SetTitle('Panduan Print Surat');
		PDF::AddPage();
		PDF::writeHTML($html_content, true, false, true, false, '');

		PDF::output('cetakpanduansurat.pdf');
	}

	

}