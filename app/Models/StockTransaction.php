<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockTransaction extends Model
{
    use HasFactory;

    protected $table = 'stock_transactions';

    protected $guarded = ['id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'tanggal_berlaku',
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
        'stock_id',
        'unit_id',
        'harga_beli',
        'harga_jual',
        'qty',
        'tipe',
    ];

    /**
     * Model relationship definition.
     * A stock transactoin belongs to a stock.
     *
     * @return BelongsTo
     */
    public function stock(): BelongsTo
    {
        return $this->belongsTo(Stock::class);
    }

     /**
     * Model relationship definition.
     * A stock transaction belongs to a unit.
     *
     * @return BelongsTo
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}
