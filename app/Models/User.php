<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'descripcion',
        'asesorNombre',
        'asesorCelular',
        'asesorEmail',
        'participado',
        'categoria',
        'subcategoria',
        'participante1_Nombre',
        'participante1_Apellidos',
        'participante1_Telefono',
        'participante1_Correo',
        'participante1_InstitucionProcedencia',
        'participante1_NivelEducativo',
        'participante1_TallaPlayera',
        'participante2_Nombre',
        'participante2_Apellidos',
        'participante2_Telefono',
        'participante2_Correo',
        'participante2_InstitucionProcedencia',
        'participante2_NivelEducativo',
        'participante2_TallaPlayera',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
