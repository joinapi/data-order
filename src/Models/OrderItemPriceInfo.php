<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $order_item_price_info_id
 * @property string $order_id
 * @property string $order_item_seq_id
 * @property string $product_price_rule_id
 * @property string $product_price_action_seq_id
 * @property float $modify_amount
 * @property string $description
 * @property string $rate_code
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 */
class OrderItemPriceInfo extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_item_price_info';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'order_item_price_info_id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['order_id', 'order_item_seq_id', 'product_price_rule_id', 'product_price_action_seq_id', 'modify_amount', 'description', 'rate_code', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];
}
