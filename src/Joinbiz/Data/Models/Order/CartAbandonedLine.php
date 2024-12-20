<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $visit_id
 * @property string $cart_abandoned_line_seq_id
 * @property string $product_id
 * @property string $prod_catalog_id
 * @property float $quantity
 * @property string $reserv_start
 * @property float $reserv_length
 * @property float $reserv_persons
 * @property float $unit_price
 * @property float $reserv2nd_p_p_perc
 * @property float $reserv_nth_p_p_perc
 * @property string $config_id
 * @property float $total_with_adjustments
 * @property string $was_reserved
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Product $product
 * @property ProdCatalog $prodCatalog
 */
class CartAbandonedLine extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cart_abandoned_line';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'prod_catalog_id', 'quantity', 'reserv_start', 'reserv_length', 'reserv_persons', 'unit_price', 'reserv2nd_p_p_perc', 'reserv_nth_p_p_perc', 'config_id', 'total_with_adjustments', 'was_reserved', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Product\Product', 'product_id', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prodCatalog()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Product\ProdCatalog', 'prod_catalog_id', 'prod_catalog_id');
    }
}
