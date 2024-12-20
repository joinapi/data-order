<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $order_id
 * @property string $order_item_seq_id
 * @property string $total_cubic_uom_id
 * @property string $total_weight_uom_id
 * @property string $status_id
 * @property string $estimated_ready_date
 * @property float $cartons
 * @property float $skids_pallets
 * @property float $units_pieces
 * @property float $total_cubic_size
 * @property float $total_weight
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property OrderHeader $orderHeader
 * @property StatusItem $statusItem
 * @property Uom $uomByTotalCubicUomId
 * @property Uom $uomByTotalWeightUomId
 */
class OrderDeliverySchedule extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'order_delivery_schedule';

    /**
     * @var array
     */
    protected $fillable = ['total_cubic_uom_id', 'total_weight_uom_id', 'status_id', 'estimated_ready_date', 'cartons', 'skids_pallets', 'units_pieces', 'total_cubic_size', 'total_weight', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

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
    public function statusItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\StatusItem', 'status_id', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByTotalCubicUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\Uom', 'total_cubic_uom_id', 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByTotalWeightUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\Uom', 'total_weight_uom_id', 'uom_id');
    }
}
