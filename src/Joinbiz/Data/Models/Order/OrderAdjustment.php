<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $order_adjustment_id
 * @property string $order_adjustment_type_id
 * @property string $order_id
 * @property string $product_promo_id
 * @property string $tax_authority_rate_seq_id
 * @property string $primary_geo_id
 * @property string $secondary_geo_id
 * @property string $tax_auth_geo_id
 * @property string $tax_auth_party_id
 * @property string $override_gl_account_id
 * @property string $created_by_user_login
 * @property string $order_item_seq_id
 * @property string $ship_group_seq_id
 * @property string $comments
 * @property string $description
 * @property float $amount
 * @property float $recurring_amount
 * @property float $amount_already_included
 * @property string $product_promo_rule_id
 * @property string $product_promo_action_seq_id
 * @property string $product_feature_id
 * @property string $corresponding_product_id
 * @property string $source_reference_id
 * @property float $source_percentage
 * @property string $customer_reference_id
 * @property float $exempt_amount
 * @property string $include_in_tax
 * @property string $include_in_shipping
 * @property string $is_manual
 * @property string $created_date
 * @property string $last_modified_date
 * @property string $last_modified_by_user_login
 * @property string $original_adjustment_id
 * @property float $amount_per_quantity
 * @property float $percentage
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property OrderAdjustmentBilling[] $orderAdjustmentBillings
 * @property OrderAdjustmentAttribute[] $orderAdjustmentAttributes
 * @property GlAccount $glAccountByOverrideGlAccountId
 * @property OrderHeader $orderHeader
 * @property Geo $geoByPrimaryGeoId
 * @property ProductPromo $productPromo
 * @property Geo $geoBySecondaryGeoId
 * @property TaxAuthorityRateProduct $taxAuthorityRateProduct
 * @property OrderAdjustmentType $orderAdjustmentType
 * @property UserLogin $userLoginByCreatedByUserLogin
 * @property ReturnAdjustment[] $returnAdjustments
 */
class OrderAdjustment extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'order_adjustment';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'order_adjustment_id';

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
    protected $fillable = ['order_adjustment_type_id', 'order_id', 'product_promo_id', 'tax_authority_rate_seq_id', 'primary_geo_id', 'secondary_geo_id', 'tax_auth_geo_id', 'tax_auth_party_id', 'override_gl_account_id', 'created_by_user_login', 'order_item_seq_id', 'ship_group_seq_id', 'comments', 'description', 'amount', 'recurring_amount', 'amount_already_included', 'product_promo_rule_id', 'product_promo_action_seq_id', 'product_feature_id', 'corresponding_product_id', 'source_reference_id', 'source_percentage', 'customer_reference_id', 'exempt_amount', 'include_in_tax', 'include_in_shipping', 'is_manual', 'created_date', 'last_modified_date', 'last_modified_by_user_login', 'original_adjustment_id', 'amount_per_quantity', 'percentage', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderAdjustmentBillings()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderAdjustmentBilling', 'order_adjustment_id', 'order_adjustment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderAdjustmentAttributes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderAdjustmentAttribute', 'order_adjustment_id', 'order_adjustment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glAccountByOverrideGlAccountId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlAccount', 'override_gl_account_id', 'gl_account_id');
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
    public function geoByPrimaryGeoId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\Geo', 'primary_geo_id', 'geo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productPromo()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Product\ProductPromo', 'product_promo_id', 'product_promo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function geoBySecondaryGeoId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\Geo', 'secondary_geo_id', 'geo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taxAuthorityRateProduct()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\TaxAuthorityRateProduct', 'tax_authority_rate_seq_id', 'tax_authority_rate_seq_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderAdjustmentType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\OrderAdjustmentType', 'order_adjustment_type_id', 'order_adjustment_type_id');
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
    public function returnAdjustments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ReturnAdjustment', 'order_adjustment_id', 'order_adjustment_id');
    }
}
