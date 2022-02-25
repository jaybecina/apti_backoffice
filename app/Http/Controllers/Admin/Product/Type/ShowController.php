<?php

namespace App\Http\Controllers\Admin\Product\Type;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\ProductTypeRepository;

class ShowController extends Controller
{
    private $repository;

    public function __construct(ProductTypeRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        $type = $this->repository->getById($id);
        return view('admin.homepage.type.show', compact('type'));
    }
}
