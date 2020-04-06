<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    protected $table = 'doctors';

    private $fillable = [
        'name',
        'surname',
        'mbr',
        'licence_number'
    ];

    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class, 'doctor_id', 'id');
    }

    public function getPatients(): array
    {
        return $this->patients()->get()->all();
    }

    public function addPatient(Patient $patient)
    {
        $this->patients()->save($patient);
    }

    public function appointments(): BelongsToMany
    {
        return $this->belongsToMany(
            Patient::class,
            'appointments',
            'doctor_id',
            'patient_id',
            'id',
            'id'
        )->withPivot('date')
        ->withTimestamps();
    }

    public function getAppointments(): array
    {
        return $this->appointments()->get()->all();
    }

    public function addAppointment(Patient $patient, array $withPivot = [])
    {
        $this->appointments()->attach($patient, $withPivot);
    }
}
