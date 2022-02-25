<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\AboutRepository;

class IndexController extends Controller
{
    private $repository;

    public function __construct(AboutRepository $repository)
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
        $about = $this->repository->all();
        $page_title = "About Us";
        return view('admin.about.index', compact('about', 'page_title'));
    }
}
