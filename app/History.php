<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'incident', 'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute(){
        return $this->user->fname . " " . $this->user->mname . " " . $this->user->lname;
    }

    public function getTimeAttribute(){
        return $this->created_at->diffForHumans();
    }
}
