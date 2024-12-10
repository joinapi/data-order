<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $order_id
 * @property string $order_item_seq_id
 * @property string $invoice_id
 * @property string $invoice_item_seq_id
 * @property string $item_issuance_id
 * @property string $shipment_receipt_id
 * @property float $quantity
 * @property float $amount
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ShipmentReceipt $shipmentReceiptByShipmentReceiptId
 * @property ItemIssuance $itemIssuance
 * @property OrderHeader $orderHeader
 */
class OrderItemBilling extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_item_billing';

    /**
     * @var array
     */
    protected $fillable = ['item_issuance_id', 'shipment_receipt_id', 'quantity', 'amount', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipmentReceiptByShipmentReceiptId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ShipmentReceipt', 'shipment_receipt_id', 'receipt_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function itemIssuance()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ItemIssuance', 'item_issuance_id', 'item_issuance_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderHeader()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\OrderHeader', 'order_id', 'order_id');
    }
}
