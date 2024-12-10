<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $quote_id
 * @property string $quote_item_seq_id
 * @property string $product_id
 * @property string $product_feature_id
 * @property string $deliverable_type_id
 * @property string $skill_type_id
 * @property string $uom_id
 * @property string $work_effort_id
 * @property string $cust_request_id
 * @property string $cust_request_item_seq_id
 * @property float $quantity
 * @property float $selected_amount
 * @property float $quote_unit_price
 * @property string $reserv_start
 * @property float $reserv_length
 * @property float $reserv_persons
 * @property string $config_id
 * @property string $estimated_delivery_date
 * @property string $comments
 * @property string $is_promo
 * @property float $lead_time_days
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property CustRequest $custRequest
 * @property DeliverableType $deliverableType
 * @property ProductFeature $productFeature
 * @property Product $product
 * @property Quote $quote
 * @property SkillType $skillType
 * @property Uom $uom
 * @property WorkEffort $workEffort
 */
class QuoteItem extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quote_item';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'product_feature_id', 'deliverable_type_id', 'skill_type_id', 'uom_id', 'work_effort_id', 'cust_request_id', 'cust_request_item_seq_id', 'quantity', 'selected_amount', 'quote_unit_price', 'reserv_start', 'reserv_length', 'reserv_persons', 'config_id', 'estimated_delivery_date', 'comments', 'is_promo', 'lead_time_days', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

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
    public function deliverableType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\DeliverableType', 'deliverable_type_id', 'deliverable_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productFeature()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ProductFeature', 'product_feature_id', 'product_feature_id');
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
    public function quote()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Quote', 'quote_id', 'quote_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function skillType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\SkillType', 'skill_type_id', 'skill_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uom()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Uom', 'uom_id', 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function workEffort()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\WorkEffort', 'work_effort_id', 'work_effort_id');
    }
}
