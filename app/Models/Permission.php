<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Permission extends Model
{
    use SoftDeletes;


    public $table = 'permissions';


    protected $fillable = [
        'title',
        'feature_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }



}
