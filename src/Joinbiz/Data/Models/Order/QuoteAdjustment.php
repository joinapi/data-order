<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $quote_adjustment_id
 * @property string $quote_adjustment_type_id
 * @property string $quote_id
 * @property string $product_promo_id
 * @property string $primary_geo_id
 * @property string $secondary_geo_id
 * @property string $tax_auth_geo_id
 * @property string $tax_auth_party_id
 * @property string $override_gl_account_id
 * @property string $created_by_user_login
 * @property string $quote_item_seq_id
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
 * @property GlAccount $glAccountByOverrideGlAccountId
 * @property Quote $quote
 * @property Geo $geoByPrimaryGeoId
 * @property ProductPromo $productPromo
 * @property Geo $geoBySecondaryGeoId
 * @property OrderAdjustmentType $orderAdjustmentTypeByQuoteAdjustmentTypeId
 * @property UserLogin $userLoginByCreatedByUserLogin
 */
class QuoteAdjustment extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'quote_adjustment';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'quote_adjustment_id';

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
    protected $fillable = ['quote_adjustment_type_id', 'quote_id', 'product_promo_id', 'primary_geo_id', 'secondary_geo_id', 'tax_auth_geo_id', 'tax_auth_party_id', 'override_gl_account_id', 'created_by_user_login', 'quote_item_seq_id', 'comments', 'description', 'amount', 'product_promo_rule_id', 'product_promo_action_seq_id', 'product_feature_id', 'corresponding_product_id', 'source_reference_id', 'source_percentage', 'customer_reference_id', 'exempt_amount', 'include_in_tax', 'include_in_shipping', 'created_date', 'last_modified_date', 'last_modified_by_user_login', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

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
    public function quote()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Quote', 'quote_id', 'quote_id');
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
    public function orderAdjustmentTypeByQuoteAdjustmentTypeId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\OrderAdjustmentType', 'quote_adjustment_type_id', 'order_adjustment_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userLoginByCreatedByUserLogin()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Security\UserLogin', 'created_by_user_login', 'user_login_id');
    }
}
