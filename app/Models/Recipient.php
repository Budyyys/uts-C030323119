<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    use HasFactory;

    // Nama tabel (optional jika nama tabel dalam plural dan sama dengan nama model)
    protected $table = 'recipients';

    // Kolom-kolom yang boleh diisi secara massal
    protected $fillable = [
        'name',
        'nik',
        'address',
        'phone_number',
        'birth_date',
        'gender',
        'marital_status',
        'income_level',
    ];

    /**
     * Relasi dengan model Distribution.
     * Satu Recipient bisa memiliki banyak Distribution.
     */
    public function distributions()
    {
        return $this->hasMany(Distribution::class);
    }
}
