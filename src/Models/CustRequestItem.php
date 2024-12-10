<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $cust_request_id
 * @property string $cust_request_item_seq_id
 * @property string $cust_request_resolution_id
 * @property string $status_id
 * @property string $product_id
 * @property float $priority
 * @property float $sequence_num
 * @property string $required_by_date
 * @property float $quantity
 * @property float $selected_amount
 * @property float $maximum_amount
 * @property string $reserv_start
 * @property float $reserv_length
 * @property float $reserv_persons
 * @property string $config_id
 * @property string $description
 * @property string $story
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property CustRequest $custRequest
 * @property Product $product
 * @property CustRequestResolution $custRequestResolution
 * @property StatusItem $statusItem
 */
class CustRequestItem extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cust_request_item';

    /**
     * @var array
     */
    protected $fillable = ['cust_request_resolution_id', 'status_id', 'product_id', 'priority', 'sequence_num', 'required_by_date', 'quantity', 'selected_amount', 'maximum_amount', 'reserv_start', 'reserv_length', 'reserv_persons', 'config_id', 'description', 'story', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function custRequest()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\CustRequest', 'cust_request_id', 'cust_request_id');
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
    public function custRequestResolution()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\CustRequestResolution', 'cust_request_resolution_id', 'cust_request_resolution_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\StatusItem', 'status_id', 'status_id');
    }
}
