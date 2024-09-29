<?php

namespace brsoftsolatul\TimeAttendance\Http\Controllers;

use App\Http\Controllers\Controller;
use brsoftsolatul\TimeAttendance\Entities\TimeAttendance;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TimeAttendanceController extends Controller
{
    public function logTimeAttendance(Request $request)
    {

        $userId = Auth::user();

       
        $existingRecord = DB::table('time_attendance')
            ->where('user_id', $userId)
            ->whereNull('time_out')
            ->first();

        if ($existingRecord) {
            
            DB::table('time_attendance')
                ->where('id', $existingRecord->id)
                ->update([
                    'time_out' => Carbon::now(), 
                    'updated_at' => Carbon::now(),
                ]);

            return response()->json([
                'message' => 'Clock stopped. Time out recorded.',
                'time_out' => Carbon::now()->toDateTimeString(),
            ]);
        } else {
           
            DB::table('time_attendance')->insert([
                'user_id' => $userId,
                'time_in' => Carbon::now(), 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            return response()->json([
                'message' => 'Clock started. Time in recorded.',
                'time_in' => Carbon::now()->toDateTimeString(),
            ]);
        }
    }
}