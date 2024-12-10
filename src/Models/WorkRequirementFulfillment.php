<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $requirement_id
 * @property string $work_effort_id
 * @property string $work_req_fulf_type_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Requirement $requirement
 * @property WorkEffort $workEffort
 * @property WorkReqFulfType $workReqFulfType
 */
class WorkRequirementFulfillment extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'work_requirement_fulfillment';

    /**
     * @var array
     */
    protected $fillable = ['work_req_fulf_type_id', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function requirement()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Requirement', 'requirement_id', 'requirement_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function workEffort()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\WorkEffort', 'work_effort_id', 'work_effort_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function workReqFulfType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\WorkReqFulfType', 'work_req_fulf_type_id', 'work_req_fulf_type_id');
    }
}
