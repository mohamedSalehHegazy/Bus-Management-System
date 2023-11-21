<?php

namespace App\Http\Controllers\Passenger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GeneralController extends Controller
{
    /**
     * DDL list for a given Model and Col records
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ddlList(Request $request)
    {
        try {
            if (class_exists('\\App\\Models\\' . $request->modelName)) {
                $cols = [];
                array_push($cols, 'id');
                foreach ($request->cols as $col) {
                    array_push($cols, $col);
                }
                $query = new ('\\App\\Models\\' . $request->modelName);

                if($request->has('only_active')){
                    $query = $query->whereActive(true);
                }

                $records = $query->get($cols);

                return apiResponse(
                    true,
                    '',
                    200,
                    $records
                );
            }

            return apiResponse(
                true,
                'Model Not Found',
                400
            );
        } catch (\Throwable $th) {
            Log::error($th);
            return apiResponse(
                false,
                'Some Thing Went Wrong !',
                500
            );
        }
    }
}
