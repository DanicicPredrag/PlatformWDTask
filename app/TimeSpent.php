<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSpent extends Model
{


    const TABLE_NAME = 'time_spent';
    const PRIMARY_KEY = 'time_spent_id';

    protected $table = TimeSpent::TABLE_NAME;
    protected $primaryKey = TimeSpent::PRIMARY_KEY;

    const VALIDATION_RULES_CREATE = [
        'activity_id' => 'required|integer|exists:'. Activities::TABLE_NAME.',' . Activities::PRIMARY_KEY,
        'description' => 'required|string',
        'time_spent' => 'required|integer|max:480',
    ];



    protected $fillable = [
        'description',
        'time_spent',
    ];


    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:M',
        'updated_at' => 'datetime:Y-m-d H:M',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function activity()
    {
        return $this->hasOne(Activities::class, Activities::PRIMARY_KEY, Activities::PRIMARY_KEY);
    }
}
