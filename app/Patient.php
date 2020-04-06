<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Patient extends Model
{
    protected $table = 'patients';

    private $fillable = [
        'name',
        'surname',
        'mbr'
    ];

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

    public function getDoctor(): Doctor
    {
        return $this->doctor()->get()->first();
    }

    public function setDoctor(Doctor $doctor)
    {
        $this->doctor()->associate($doctor);
    }

    public function appointments(): BelongsToMany
    {
        return $this->belongsToMany(
            Doctor::class,
            'appointments',
            'patient_id',
            'doctor_id',
            'id',
            'id'
        )->withPivot('date')
        ->withTimestamps();
    }

    public function getAppointments(): array
    {
        return $this->appointments()->get()->all();
    }

    public function addAppointment(Doctor $doctor, array $withPivot = [])
    {
        $this->appointments()->attach($doctor, $withPivot);
    }
}
