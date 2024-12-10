<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $order_id
 * @property string $order_item_seq_id
 * @property string $engagement_id
 * @property string $engagement_item_seq_id
 * @property string $product_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property OrderHeader $orderHeaderByEngagementId
 * @property OrderHeader $orderHeader
 * @property Product $product
 */
class ProductOrderItem extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_order_item';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderHeaderByEngagementId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\OrderHeader', 'engagement_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderHeader()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\OrderHeader', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Product', 'product_id', 'product_id');
    }
}
