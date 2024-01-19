<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    /**
     * Get the user that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->select(['name', 'username', 'imagen']);
    }

    /**
     * Get all of the comments for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

     //Un post tiene muchos comentarios
    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class);
    }


    /**
     * Get all of the comments for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    //Un post tiene muchos likes
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }


    //Comprobar si un usuario ya dio like
    public function checkLike(User $user){
        return $this->likes->contains('user_id', $user->id);
    }
}
