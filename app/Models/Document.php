<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable(['code', 'name', 'description', 'type'])]
class Document extends Model
{
    use HasFactory;

    public function versions(): HasMany
    {
        return $this->hasMany(DocumentVersion::class);
    }

    public function latestVersion(): HasOne
    {
        return $this
            ->hasOne(DocumentVersion::class)
            ->ofMany('version_number', 'max');
    }
}