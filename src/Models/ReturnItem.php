<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $return_id
 * @property string $return_item_seq_id
 * @property string $return_reason_id
 * @property string $return_type_id
 * @property string $return_item_type_id
 * @property string $product_id
 * @property string $order_id
 * @property string $order_item_seq_id
 * @property string $status_id
 * @property string $expected_item_status
 * @property string $return_item_response_id
 * @property string $description
 * @property float $return_quantity
 * @property float $received_quantity
 * @property float $return_price
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property StatusItem $statusItemByExpectedItemStatus
 * @property OrderHeader $orderHeader
 * @property Product $product
 * @property ReturnReason $returnReason
 * @property ReturnItemResponse $returnItemResponse
 * @property ReturnHeader $returnHeader
 * @property StatusItem $statusItem
 * @property ReturnItemType $returnItemType
 * @property ReturnType $returnType
 */
class ReturnItem extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'return_item';

    /**
     * @var array
     */
    protected $fillable = ['return_reason_id', 'return_type_id', 'return_item_type_id', 'product_id', 'order_id', 'order_item_seq_id', 'status_id', 'expected_item_status', 'return_item_response_id', 'description', 'return_quantity', 'received_quantity', 'return_price', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusItemByExpectedItemStatus()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\StatusItem', 'expected_item_status', 'status_id');
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function returnReason()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ReturnReason', 'return_reason_id', 'return_reason_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function returnItemResponse()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ReturnItemResponse', 'return_item_response_id', 'return_item_response_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function returnHeader()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ReturnHeader', 'return_id', 'return_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\StatusItem', 'status_id', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function returnItemType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ReturnItemType', 'return_item_type_id', 'return_item_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function returnType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ReturnType', 'return_type_id', 'return_type_id');
    }
}
