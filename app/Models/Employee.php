<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;

    // Indicamos las columnas que se pueden asignar masivamente
    protected $fillable = [
        'first_name',
        'last_name',
        'employee_id_number',
        'position',
        'hiring_date',
        'company_name',
        'photo_path',
    ];

    /**
     * Define la relación "uno a muchos" con AssetAssignment.
     * Un empleado puede tener muchas asignaciones de activos.
     */
    public function assetAssignments(): HasMany
    {
        return $this->hasMany(AssetAssignment::class);
    }

    /**
     * Método para calcular el tiempo en la empresa.
     * Usaremos Carbon para manejar fechas.
     */
    public function getTimeInCompanyAttribute(): string
    {
        // Asegúrate de que hiring_date sea una instancia de Carbon
        $hiringDate = \Carbon\Carbon::parse($this->hiring_date);
        $now = \Carbon\Carbon::now();

        $diff = $hiringDate->diff($now);

        $years = $diff->y;
        $months = $diff->m;
        $days = $diff->d;

        $time = [];
        if ($years > 0) {
            $time[] = $years . ' año' . ($years > 1 ? 's' : '');
        }
        if ($months > 0) {
            $time[] = $months . ' mes' . ($months > 1 ? 'es' : '');
        }
        if ($days > 0) {
            $time[] = $days . ' día' . ($days > 1 ? 's' : '');
        }

        return count($time) > 0 ? implode(', ', $time) : 'Menos de un día';
    }
}
