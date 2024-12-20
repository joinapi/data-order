<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $blacklist_string
 * @property string $order_blacklist_type_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property OrderBlacklistType $orderBlacklistType
 */
class OrderBlacklist extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'order_blacklist';

    /**
     * @var array
     */
    protected $fillable = ['last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderBlacklistType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\OrderBlacklistType', 'order_blacklist_type_id', 'order_blacklist_type_id');
    }
}