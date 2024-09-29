<?php 

namespace brsoftsolatul\TimeAttendance\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeAttendance extends Model

{

    use HasFactory;

    protected $fillable = [

        'user_id', 
        
        'time_in', 

        'time_out'
    ];

}