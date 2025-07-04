<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_type',
        'name',
        'serial_number',
        'internal_id',
        'status',
        'photo_path',
    ];

    /**
     * Define la relación "uno a muchos" con AssetAssignment.
     * Un activo puede tener muchas asignaciones a lo largo del tiempo.
     */
    public function assetAssignments(): HasMany
    {
        return $this->hasMany(AssetAssignment::class);
    }
}
