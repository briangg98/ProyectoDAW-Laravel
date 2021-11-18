<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function getPriorityFullAttribute(){
        switch ($this->priority) {
            case 'B': 
                return 'Baja';
            case 'N': 
                return 'Normal';
            default:
                return 'Alta';
        }
    }
    public function getTitleSHortAttribute(){
        return mb_strimwidth($this->title, 0, 20, '...');
    }
}
