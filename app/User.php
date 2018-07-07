<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'fname', 'mname', 'lname', 'usertype', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function records(){
        return $this->hasMany(Record::class);
    }

    public function history(){
        return $this->hasMany(History::class);
    }

    public function getFulNameAttribute(){
        return $this->fname . " " . $this->mname[0] . ". " . $this->lname;
    }

    public function getFullNameAttribute(){
        return $this->fname . " " . $this->mname . " " . $this->lname;
    }

    public function getTimeAttribute(){
        return $this->created_at->toDayDateTimeString();
    }
}
