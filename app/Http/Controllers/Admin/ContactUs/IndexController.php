<?php

namespace App\Http\Controllers\Admin\ContactUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\ContactUsRepository;

class IndexController extends Controller
{

    private $repository;

    public function __construct(ContactUsRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $contactUs = $this->repository->all();
        // return $contactUs;
        return view('admin.contact_us.index', compact('contactUs'));
    }
}
