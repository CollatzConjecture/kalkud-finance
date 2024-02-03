<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasUuid;
    use HasFactory;

    protected $table = 'products';

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
        'product_types_id',
        'nama',
        'harga_beli_satuan',
        'harga_jual_satuan',
        'tanggal_berlaku',
    ];

    /**
     * Model relationship definition.
     * A product belongs to a product type.
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(ProductType::class);
    }

    /**
     * Model relationship definition.
     * A product has many stock.
     *
     * @return HasMany
     */
    public function stock(): HasMany
    {
        return $this->hasMany(Stock::class, 'product_id');
    }
}
