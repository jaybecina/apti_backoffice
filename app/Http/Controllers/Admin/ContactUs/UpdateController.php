<?php

namespace App\Http\Controllers\Admin\ContactUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\UpdateContactUsRequest;

use App\Repositories\ContactUsRepository;
use App\Services\ContactUsService;

use Illuminate\Contracts\Cache\Factory;

class UpdateController extends Controller
{
    private $repository;
    private $service;

    public function __construct(ContactUsRepository $repository, ContactUsService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateContactUsRequest $request, Factory $cache)
    {
        $request = $request->only('location', 'address', 'telephone_number', 'cellphone_number', 'email_address', 'website_url');
        try {
            foreach ($request as $key => $value) {
                $item = $this->repository->findNameValue($key);
                if ($item != null) {
                   $item = $this->service->updateValue($item, $value);
                }
            }
            $cache->forget('contact_us_settings');
            return redirect()->back()->with('success', 'Successfully update!');
        } catch (\Throwable $th) {
            \Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Ops! Something went wrong. Error Message: ' . $th->getMessage());
        }
    }
}
