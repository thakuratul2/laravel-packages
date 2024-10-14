<?php 

namespace brsoftsolatul\TimeAttendance\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeAttendance extends Model

{

    use HasFactory;

    protected $table = 'time_attendance';
    protected $fillable = [

        'user_id', 
        
        'time_in', 

        'time_out'
    ];
/**
     * Log the time-in for the user
     *
     * @param int $userId
     * @return array
     */
    public static function logTimeIn($userId)
    {
        // Get the current date and time
        $currentDateTime = Carbon::now()->format('Y-m-d H:i:s');

        // Create a new time attendance record
        $record = self::create([
            'user_id' => $userId,
            'time_in' => $currentDateTime,
            'created_at' => $currentDateTime,
            'updated_at' => $currentDateTime,
        ]);

        return [
            'message' => 'Clock started. Time in recorded.',
            'time_in' => $currentDateTime,
        ];
    }

    /**
     * Log the time-out for the user
     *
     * @param int $recordId
     * @return array
     */
    public static function logTimeOut($recordId)
    {
        // Get the current date and time
        $currentDateTime = Carbon::now()->format('Y-m-d H:i:s');

        // Update the existing record with time-out
        $record = self::where('id', $recordId)->update([
            'time_out' => $currentDateTime,
            'updated_at' => $currentDateTime,
        ]);

        return [
            'message' => 'Clock stopped. Time out recorded.',
            'time_out' => $currentDateTime,
        ];
    }

    /**
     * Get the existing time-in record for the user without time-out
     *
     * @param int $userId
     * @return TimeAttendance|null
     */
    public static function getExistingRecord($userId)
    {
        return self::where('user_id', $userId)
            ->whereNull('time_out')
            ->first();
    }
}