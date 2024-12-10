<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $order_item_change_id
 * @property string $order_id
 * @property string $order_item_seq_id
 * @property string $change_type_enum_id
 * @property string $change_user_login
 * @property string $reason_enum_id
 * @property string $change_datetime
 * @property float $quantity
 * @property float $cancel_quantity
 * @property float $unit_price
 * @property string $item_description
 * @property string $change_comments
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Enumeration $enumerationByReasonEnumId
 * @property Enumeration $enumerationByChangeTypeEnumId
 * @property UserLogin $userLoginByChangeUserLogin
 */
class OrderItemChange extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_item_change';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'order_item_change_id';

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
    protected $fillable = ['order_id', 'order_item_seq_id', 'change_type_enum_id', 'change_user_login', 'reason_enum_id', 'change_datetime', 'quantity', 'cancel_quantity', 'unit_price', 'item_description', 'change_comments', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enumerationByReasonEnumId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Enumeration', 'reason_enum_id', 'enum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enumerationByChangeTypeEnumId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Enumeration', 'change_type_enum_id', 'enum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userLoginByChangeUserLogin()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\UserLogin', 'change_user_login', 'user_login_id');
    }
}
