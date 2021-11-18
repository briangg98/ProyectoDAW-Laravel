<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    public static $rules = [
        'name' => 'required|max:255',
        'description' => '',
        'start' => 'date'
    ];

    public static $messages = [
        'name.required' => 'Es necesario ingresar el nombre del proyecto.',
        'start.date' => 'El formato de fecha es incorrecto.',
    ];

    protected $fillable = [
        'name', 'description', 'start',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    public function levels()
    {
        return $this->hasMany('App\Level');
    }
}
