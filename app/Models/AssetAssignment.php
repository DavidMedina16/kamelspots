<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssetAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'asset_id',
        'assignment_date',
        'return_date',
        'notes',
    ];

    /**
     * Define la relación "pertenece a" con Employee.
     * Una asignación pertenece a un empleado.
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Define la relación "pertenece a" con Asset.
     * Una asignación pertenece a un activo.
     */
    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class);
    }
}
