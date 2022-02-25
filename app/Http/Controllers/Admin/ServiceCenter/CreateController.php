<?php

namespace App\Http\Controllers\Admin\ServiceCenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\RegionRepository;
use App\Repositories\OfficeHoursRepository;
use App;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $regions = App::make(RegionRepository::class)->all();
        
        $office_hours = [
            '01:00 - 09:00',
            '02:00 - 10:00',
            '03:00 - 11:00',
            '04:00 - 12:00',
            '05:00 - 13:00',
            '06:00 - 14:00',
            '07:00 - 15:00',
            '08:00 - 16:00',
            '09:00 - 17:00',
            '10:00 - 18:00',
            '11:00 - 19:00',
            '12:00 - 20:00',
            '13:00 - 21:00',
            '14:00 - 22:00',
            '15:00 - 23:00',
            '16:00 - 24:00',
            '17:00 - 01:00',
            '18:00 - 02:00',
            '19:00 - 03:00',
            '20:00 - 04:00',
            '21:00 - 05:00',
            '22:00 - 06:00',
            '23:00 - 07:00',
            '24:00 - 08:00'
        ];

        return view('admin.service_center.create', compact(['regions', 'office_hours']));
    }
}
