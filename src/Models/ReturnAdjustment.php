<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $return_adjustment_id
 * @property string $return_adjustment_type_id
 * @property string $return_id
 * @property string $return_type_id
 * @property string $order_adjustment_id
 * @property string $product_promo_id
 * @property string $tax_authority_rate_seq_id
 * @property string $primary_geo_id
 * @property string $secondary_geo_id
 * @property string $tax_auth_geo_id
 * @property string $tax_auth_party_id
 * @property string $override_gl_account_id
 * @property string $created_by_user_login
 * @property string $return_item_seq_id
 * @property string $ship_group_seq_id
 * @property string $comments
 * @property string $description
 * @property float $amount
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
 * @property string $created_date
 * @property string $last_modified_date
 * @property string $last_modified_by_user_login
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ReturnType $returnType
 * @property GlAccount $glAccountByOverrideGlAccountId
 * @property OrderAdjustment $orderAdjustment
 * @property Geo $geoByPrimaryGeoId
 * @property ProductPromo $productPromo
 * @property ReturnHeader $returnHeader
 * @property Geo $geoBySecondaryGeoId
 * @property TaxAuthorityRateProduct $taxAuthorityRateProduct
 * @property ReturnAdjustmentType $returnAdjustmentType
 * @property UserLogin $userLoginByCreatedByUserLogin
 */
class ReturnAdjustment extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'return_adjustment';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'return_adjustment_id';

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
    protected $fillable = ['return_adjustment_type_id', 'return_id', 'return_type_id', 'order_adjustment_id', 'product_promo_id', 'tax_authority_rate_seq_id', 'primary_geo_id', 'secondary_geo_id', 'tax_auth_geo_id', 'tax_auth_party_id', 'override_gl_account_id', 'created_by_user_login', 'return_item_seq_id', 'ship_group_seq_id', 'comments', 'description', 'amount', 'product_promo_rule_id', 'product_promo_action_seq_id', 'product_feature_id', 'corresponding_product_id', 'source_reference_id', 'source_percentage', 'customer_reference_id', 'exempt_amount', 'include_in_tax', 'include_in_shipping', 'created_date', 'last_modified_date', 'last_modified_by_user_login', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function returnType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ReturnType', 'return_type_id', 'return_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glAccountByOverrideGlAccountId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\GlAccount', 'override_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderAdjustment()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\OrderAdjustment', 'order_adjustment_id', 'order_adjustment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function geoByPrimaryGeoId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Geo', 'primary_geo_id', 'geo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productPromo()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ProductPromo', 'product_promo_id', 'product_promo_id');
    }

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
    public function geoBySecondaryGeoId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Geo', 'secondary_geo_id', 'geo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taxAuthorityRateProduct()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\TaxAuthorityRateProduct', 'tax_authority_rate_seq_id', 'tax_authority_rate_seq_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function returnAdjustmentType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ReturnAdjustmentType', 'return_adjustment_type_id', 'return_adjustment_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userLoginByCreatedByUserLogin()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\UserLogin', 'created_by_user_login', 'user_login_id');
    }
}
