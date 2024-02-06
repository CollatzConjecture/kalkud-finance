<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stock extends Model
{
    use HasUuid;
    use HasFactory;

    protected $table = 'stocks';

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
        'product_id',
        'harga_beli',
        'harga_jual',
        'qty',
    ];

    /**
     * Model relationship definition.
     * A stock has many stock transaction.
     *
     * @return HasMany
     */
    public function stock(): HasMany
    {
        return $this->hasMany(StockTransaction::class, 'stock_id');
    }

    /**
     * Model relationship definition.
     * A stock belongs to a prodcut.
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
