<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionFeature extends Model
{
    use HasFactory;

    public $table = 'permission_feature';

    protected $fillable = ['permission_id','feature_id'];
}
