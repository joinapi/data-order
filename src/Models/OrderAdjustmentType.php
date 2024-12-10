<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $order_adjustment_type_id
 * @property string $parent_type_id
 * @property string $has_table
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ProductPromoAction[] $productPromoActions
 * @property OrderAdjustmentType $orderAdjustmentTypeByParentTypeId
 * @property OrderAdjustment[] $orderAdjustments
 * @property OrderAdjustmentTypeAttr[] $orderAdjustmentTypeAttrs
 * @property QuoteAdjustment[] $quoteAdjustmentsByQuoteAdjustmentTypeId
 */
class OrderAdjustmentType extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_adjustment_type';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'order_adjustment_type_id';

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
    protected $fillable = ['parent_type_id', 'has_table', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productPromoActions()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ProductPromoAction', 'order_adjustment_type_id', 'order_adjustment_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderAdjustmentTypeByParentTypeId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\OrderAdjustmentType', 'parent_type_id', 'order_adjustment_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderAdjustments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderAdjustment', 'order_adjustment_type_id', 'order_adjustment_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderAdjustmentTypeAttrs()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderAdjustmentTypeAttr', 'order_adjustment_type_id', 'order_adjustment_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quoteAdjustmentsByQuoteAdjustmentTypeId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\QuoteAdjustment', 'quote_adjustment_type_id', 'order_adjustment_type_id');
    }
}
