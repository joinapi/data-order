<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $desired_feature_id
 * @property string $requirement_id
 * @property string $product_feature_id
 * @property string $optional_ind
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ProductFeature $productFeature
 * @property Requirement $requirement
 */
class DesiredFeature extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'desired_feature';

    /**
     * @var array
     */
    protected $fillable = ['product_feature_id', 'optional_ind', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

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
    public function requirement()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Requirement', 'requirement_id', 'requirement_id');
    }
}
