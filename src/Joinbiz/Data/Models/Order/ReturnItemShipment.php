<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $return_id
 * @property string $return_item_seq_id
 * @property string $shipment_id
 * @property string $shipment_item_seq_id
 * @property float $quantity
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ReturnHeader $returnHeader
 * @property Shipment $shipment
 */
class ReturnItemShipment extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'return_item_shipment';

    /**
     * @var array
     */
    protected $fillable = ['quantity', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

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
    public function shipment()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Shipment', 'shipment_id', 'shipment_id');
    }
}
