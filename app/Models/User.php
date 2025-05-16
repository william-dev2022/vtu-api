<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\TransactionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'phone_number',
        'password',
        'pin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'pin',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'pin' => 'hashed',
        ];
    }




    public function deposits()
    {
        $deposits = Transaction::where('user_id', $this->id)
            ->where('type', 'deposit')
            ->get();
        return $deposits;
    }


    public function balance()
    {
        $totalDeposits = $this->deposits()->sum('amount');
        $totalExpenses = Transaction::where('user_id', $this->id)
            ->whereIn('status', ['completed', 'pending'])
            ->where('type', '!=', TransactionType::DEPOSIT->value)
            ->sum('amount');

        return $totalDeposits - $totalExpenses;
    }
}
