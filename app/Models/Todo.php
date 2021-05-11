<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\todo
 *
 * @property int $id
 * @property string $title
 * @property string $status
 * @property string|null $description
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\todoFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|todo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|todo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|todo query()
 * @method static \Illuminate\Database\Eloquent\Builder|todo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|todo whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|todo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|todo whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|todo whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|todo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|todo whereUserId($value)
 * @mixin \Eloquent
 */
class Todo extends Model
{
    use HasFactory;
    protected $fillable = ['title','status','description' ,'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
