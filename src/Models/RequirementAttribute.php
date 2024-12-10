<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $requirement_id
 * @property string $attr_name
 * @property string $attr_value
 * @property string $attr_description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Requirement $requirement
 */
class RequirementAttribute extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'requirement_attribute';

    /**
     * @var array
     */
    protected $fillable = ['attr_value', 'attr_description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function requirement()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Requirement', 'requirement_id', 'requirement_id');
    }
}
