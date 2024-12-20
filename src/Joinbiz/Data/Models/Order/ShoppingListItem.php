<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $shopping_list_id
 * @property string $shopping_list_item_seq_id
 * @property string $product_id
 * @property float $quantity
 * @property float $modified_price
 * @property string $reserv_start
 * @property float $reserv_length
 * @property float $reserv_persons
 * @property float $quantity_purchased
 * @property string $config_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ShoppingList $shoppingList
 * @property Product $product
 */
class ShoppingListItem extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'shopping_list_item';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'quantity', 'modified_price', 'reserv_start', 'reserv_length', 'reserv_persons', 'quantity_purchased', 'config_id', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shoppingList()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ShoppingList', 'shopping_list_id', 'shopping_list_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Product\Product', 'product_id', 'product_id');
    }
}
