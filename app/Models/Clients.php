<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $primaryKey = 'client_id';

    protected $fillable = [
            'client_name',
            'assigned_user',
            'assign_smm',
            'client_email',
            'date_created',
            'date_updated',
            'business_brief'=>'nullable',
            'drive_link'=>'nullable',
            'trello_link'=>'nullable',
            'plan',
            'status'=>'nullable',
            'swap_count'=>'nullable'
    ];
}
