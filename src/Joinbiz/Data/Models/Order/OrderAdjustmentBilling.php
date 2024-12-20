<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $order_adjustment_id
 * @property string $invoice_id
 * @property string $invoice_item_seq_id
 * @property float $amount
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property OrderAdjustment $orderAdjustment
 */
class OrderAdjustmentBilling extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'order_adjustment_billing';

    /**
     * @var array
     */
    protected $fillable = ['amount', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderAdjustment()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\OrderAdjustment', 'order_adjustment_id', 'order_adjustment_id');
    }
}
