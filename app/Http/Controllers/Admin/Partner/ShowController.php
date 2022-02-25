<?php

namespace App\Http\Controllers\Admin\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\PartnerRepository;

class ShowController extends Controller
{
    private $repository;

    public function __construct(PartnerRepository $repository)
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
        $partner = $this->repository->getById($id);
        return view('admin.partner.show', compact('partner'));
    }
}
