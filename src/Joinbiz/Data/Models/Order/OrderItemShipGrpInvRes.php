<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $order_id
 * @property string $ship_group_seq_id
 * @property string $order_item_seq_id
 * @property string $inventory_item_id
 * @property string $reserve_order_enum_id
 * @property float $quantity
 * @property float $quantity_not_available
 * @property string $reserved_datetime
 * @property string $created_datetime
 * @property string $promised_datetime
 * @property string $current_promised_date
 * @property string $priority
 * @property float $sequence_id
 * @property string $pick_start_date
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property InventoryItem $inventoryItem
 */
class OrderItemShipGrpInvRes extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'order_item_ship_grp_inv_res';

    /**
     * @var array
     */
    protected $fillable = ['reserve_order_enum_id', 'quantity', 'quantity_not_available', 'reserved_datetime', 'created_datetime', 'promised_datetime', 'current_promised_date', 'priority', 'sequence_id', 'pick_start_date', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inventoryItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Product\InventoryItem', 'inventory_item_id', 'inventory_item_id');
    }
}
