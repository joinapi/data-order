<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $return_item_response_id
 * @property string $order_payment_preference_id
 * @property string $replacement_order_id
 * @property string $payment_id
 * @property string $billing_account_id
 * @property string $fin_account_trans_id
 * @property float $response_amount
 * @property string $response_date
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ReturnItem[] $returnItems
 * @property BillingAccount $billingAccount
 * @property FinAccountTrans $finAccountTrans
 * @property OrderPaymentPreference $orderPaymentPreference
 * @property Payment $payment
 * @property OrderHeader $orderHeaderByReplacementOrderId
 */
class ReturnItemResponse extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'return_item_response';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'return_item_response_id';

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
    protected $fillable = ['order_payment_preference_id', 'replacement_order_id', 'payment_id', 'billing_account_id', 'fin_account_trans_id', 'response_amount', 'response_date', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnItems()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ReturnItem', 'return_item_response_id', 'return_item_response_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function billingAccount()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\BillingAccount', 'billing_account_id', 'billing_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function finAccountTrans()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\FinAccountTrans', 'fin_account_trans_id', 'fin_account_trans_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderPaymentPreference()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\OrderPaymentPreference', 'order_payment_preference_id', 'order_payment_preference_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Payment', 'payment_id', 'payment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderHeaderByReplacementOrderId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\OrderHeader', 'replacement_order_id', 'order_id');
    }
}
