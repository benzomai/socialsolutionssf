<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMM extends Model
{
    use HasFactory;

    protected $table = 'smm';

    protected $primaryKey = 'socmed_id';

    protected $fillable = [
            'socmed_user_id',
            'socmed_description'=>'nullable',
            'socmed_status',
            'client_swap_count'=>'nullable'
    ];
}
