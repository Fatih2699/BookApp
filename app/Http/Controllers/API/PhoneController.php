<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Phone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PhoneController extends BaseController
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //'formattedNumber'=>'required',
            'number' => 'required',
            'name' => 'required',
            'calltype' => 'required',
            'duration' => 'required',
            'begin_date' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }
        $input = $request->except('begin_date');
        //$input['begin_date'] = Carbon::parse($input['begin_date']);
        $input['begin_date'] = Carbon::createFromFormat('Y-m-d H:i:s.u', $request->begin_date)->format('Y-m-d H:i:s');
        $phone = Phone::create($input);
        $success['success'] = true;
        return $this->sendResponse($success, 'Successfully saved');
    }
    public function getList()
    {
        $phones = Phone::orderByDesc('begin_date')->limit(10)->get();
        $lastRecord = null;
        if (isset($phones[0])) {
            $lastRecord = $phones[0]->begin_date;
        }
        //$lastRecord=Phone::latest()->first();
        return [
            "list" => $phones,
            "last_data_time" => $lastRecord,
        ];
    }

    public function postLastDatas(Request $request)
    {
        $phoneData = json_decode($request->calls,true);
        foreach ($phoneData as $data) {
            $data['begin_date'] = Carbon::createFromFormat('Y-m-d H:i:s.u', $data['begin_date'])->format('Y-m-d H:i:s');
            $phone = Phone::firstOrCreate(
                [
                    "begin_date" => $data['begin_date'],
                    "number" => $data['number']
                ],
                [
                    "name" => $data['name']??"name"=="",
                    "duration" => $data['duration'],
                    "calltype" => $data['calltype'],
                ]
            );
        }
        $success['success'] = true;
        return $this->sendResponse($success, 'Successfully saved');
    }
}
