<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'user_id','type',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute()
    {
        return $this->user->fname . " " . $this->user->mname . " " . $this->user->lname;
    }

    public function getAttTypeAttribute(){
        return $this->created_at->hour < 12 && $this->created_at->hour > 6 ? 'Morning ' . $this->type : 'Afternoon ' . $this->type;
    }

    public function getTimeAttribute(){
         return $this->created_at->toDayDateTimeString();
    }
}
