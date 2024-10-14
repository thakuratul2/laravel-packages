<?php

namespace brsoftsolatul\TimeAttendance\Http\Controllers;

use App\Http\Controllers\Controller;
use brsoftsolatul\TimeAttendance\Entities\TimeAttendance;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeAttendanceController extends Controller
{
    public function logTimeAttendance()
    {
        $userId = Auth::id(); 

        // Check if there's an existing time-in record without time-out
        $existingRecord = TimeAttendance::getExistingRecord($userId);

        if ($existingRecord) {
            // Log time-out if there's an existing record
            $response = TimeAttendance::logTimeOut($existingRecord->id);

            return response()->json($response);
        } else {
            // Log time-in if no existing record
            $response = TimeAttendance::logTimeIn($userId);

            return response()->json($response);
        }
    }
}
