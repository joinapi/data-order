<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $order_payment_preference_id
 * @property string $order_id
 * @property string $product_price_purpose_id
 * @property string $payment_method_type_id
 * @property string $payment_method_id
 * @property string $fin_account_id
 * @property string $status_id
 * @property string $created_by_user_login
 * @property string $order_item_seq_id
 * @property string $ship_group_seq_id
 * @property string $security_code
 * @property string $track2
 * @property string $present_flag
 * @property string $swiped_flag
 * @property string $overflow_flag
 * @property float $max_amount
 * @property float $process_attempt
 * @property string $billing_postal_code
 * @property string $manual_auth_code
 * @property string $manual_ref_num
 * @property string $needs_nsf_retry
 * @property string $created_date
 * @property string $last_modified_date
 * @property string $last_modified_by_user_login
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ReturnItemResponse[] $returnItemResponses
 * @property FinAccount $finAccount
 * @property OrderHeader $orderHeader
 * @property PaymentMethod $paymentMethod
 * @property PaymentMethodType $paymentMethodType
 * @property ProductPricePurpose $productPricePurpose
 * @property StatusItem $statusItem
 * @property UserLogin $userLoginByCreatedByUserLogin
 * @property PaymentGatewayResponse[] $paymentGatewayResponses
 * @property Payment[] $paymentsByPaymentPreferenceId
 */
class OrderPaymentPreference extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'order_payment_preference';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'order_payment_preference_id';

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
    protected $fillable = ['order_id', 'product_price_purpose_id', 'payment_method_type_id', 'payment_method_id', 'fin_account_id', 'status_id', 'created_by_user_login', 'order_item_seq_id', 'ship_group_seq_id', 'security_code', 'track2', 'present_flag', 'swiped_flag', 'overflow_flag', 'max_amount', 'process_attempt', 'billing_postal_code', 'manual_auth_code', 'manual_ref_num', 'needs_nsf_retry', 'created_date', 'last_modified_date', 'last_modified_by_user_login', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnItemResponses()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ReturnItemResponse', 'order_payment_preference_id', 'order_payment_preference_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function finAccount()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\FinAccount', 'fin_account_id', 'fin_account_id');
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
    public function paymentMethod()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentMethod', 'payment_method_id', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethodType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentMethodType', 'payment_method_type_id', 'payment_method_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productPricePurpose()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Product\ProductPricePurpose', 'product_price_purpose_id', 'product_price_purpose_id');
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
    public function userLoginByCreatedByUserLogin()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Security\UserLogin', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentGatewayResponses()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentGatewayResponse', 'order_payment_preference_id', 'order_payment_preference_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentsByPaymentPreferenceId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\Payment', 'payment_preference_id', 'order_payment_preference_id');
    }
}
