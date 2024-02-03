<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    use HasUuid;
    use HasFactory;

    protected $table = 'units';

    protected $guarded = ['id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 
        'nama',
        'jenis',
    ];

    /**
     * Model relationship definition.
     * A unit has many stock transaction.
     *
     * @return HasMany
     */
    public function unit(): HasMany
    {
        return $this->hasMany(StockTransaction::class, 'unit_id');
    }
}
