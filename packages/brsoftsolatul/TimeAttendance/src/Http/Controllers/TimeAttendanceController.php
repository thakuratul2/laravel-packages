<?php

namespace brsoftsolatul\TimeAttendance\Http\Controllers;

use App\Http\Controllers\Controller;
use brsoftsolatul\TimeAttendance\Entities\TimeAttendance;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeAttendanceController extends Controller
{
    public function logTimeAttendance(Request $request)
    {
        $userId = Auth::id();
        $localTime = $request->input('local_time');

       
        $existingRecord = DB::table('time_attendance')
            ->where('user_id', $userId)
            ->whereNull('time_out')
            ->first();

        if ($existingRecord) {
          
            DB::table('time_attendance')
                ->where('id', $existingRecord->id)
                ->update([
                    'time_out' => $localTime,
                    'updated_at' => now(),
                ]);

            return response()->json([
                'message' => 'Clock stopped. Time out recorded.',
                'time_out' => $localTime,
            ]);
        } else {
           
            DB::table('time_attendance')->insert([
                'user_id' => $userId,
                'time_in' => $localTime, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'message' => 'Clock started. Time in recorded.',
                'time_in' => $localTime,
            ]);
        }
    }
}
