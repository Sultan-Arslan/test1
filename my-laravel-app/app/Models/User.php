<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'photo',
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

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'lesson_users');
    }

    // Другие свойства и методы модели

    /**
     * Мутатор для установки номера телефона в нужном формате.
     *
     * @param string $value
     * @return void
     */
    public function setPhoneAttribute($value)
    {
        // Удаляем все нецифровые символы
        $this->attributes['phone'] = preg_replace('/\D/', '', $value);
    }

    /**
     * Аксессор для получения номера телефона в формате +7-702-640-40-95.
     *
     * @return string
     */
    public function getPhoneAttribute()
    {
        $phone = $this->attributes['phone'];

        // Преобразуем номер телефона в формат +7-702-640-40-95
        return '+7-' . substr($phone, 1, 3) . '-' . substr($phone, 4, 3) . '-' . substr($phone, 7, 2) . '-' . substr($phone, 9, 2);
    }
}
