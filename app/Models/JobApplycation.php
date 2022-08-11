<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplycation extends Model
{
    use HasFactory;
    protected $tabel = 'job_applycations';
    protected $guarded = [''];

    public function company()
    {
        return $this->belongsTo(JobType::class);
    }
}
