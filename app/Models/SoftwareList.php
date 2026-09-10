<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoftwareList extends Model
{
    protected $fillable = [
        'name',
        'type',
        'ubication',
        'clasification',
        'User',
        'Admin',
        'installationDate',
        'proposal',
        'secury',
        'licenseType',
        'license',
        'status',
        'aprobation',
        'area'
    ];
}