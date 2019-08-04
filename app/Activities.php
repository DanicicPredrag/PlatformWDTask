<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    const TABLE_NAME = 'activities';
    const PRIMARY_KEY = 'activity_id';

    protected $table = Activities::TABLE_NAME;
    protected $primaryKey = Activities::PRIMARY_KEY;

    const VALIDATION_RULES_CREATE = [
        'title' => 'required|string|max:255',
    ];


    protected $fillable = [
        'title',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:M',
        'updated_at' => 'datetime:Y-m-d H:M',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function time_spent() {
        return $this->hasMany(TimeSpent::class, Activities::PRIMARY_KEY, Activities::PRIMARY_KEY);
    }

}
