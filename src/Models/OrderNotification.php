<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $order_notification_id
 * @property string $order_id
 * @property string $email_type
 * @property string $comments
 * @property string $notification_date
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Enumeration $enumerationByEmailType
 * @property OrderHeader $orderHeader
 */
class OrderNotification extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_notification';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'order_notification_id';

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
    protected $fillable = ['order_id', 'email_type', 'comments', 'notification_date', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enumerationByEmailType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Enumeration', 'email_type', 'enum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderHeader()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\OrderHeader', 'order_id', 'order_id');
    }
}
