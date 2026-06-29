<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Forum\Forum;
use App\Models\Forum\Reply;
use App\Models\Reviews\Review;
use App\Models\Services\Service;
use App\Traits\HasSlug;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use App\Policies\UserPolicy;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[UsePolicy(UserPolicy::class)]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'avatar',
        'name',
        'email',
        'password',
        'bio'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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
        ];
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function averageRating()
    {
        return Review::whereHasMorph(
            'reviewable',
            [Service::class],
            function ($query) {
                $query->where('user_id', $this->id);
            }
        )->avg('rating');
    }

    public function reviewsCount()
    {
        return Review::whereHasMorph(
            'reviewable',
            [Service::class],
            function ($query) {
                $query->where('user_id', $this->id);
            }
        )->count();
    }

    public function forumTopics(): HasMany
    {
        return $this->hasMany(Forum::class);
    }

    public function forumReplies(): HasMany
    {
        return $this->hasMany(Reply::class);
    }
}
