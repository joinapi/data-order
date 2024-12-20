<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $budget_id
 * @property string $budget_item_seq_id
 * @property string $requirement_id
 * @property float $amount
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Requirement $requirement
 */
class RequirementBudgetAllocation extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'requirement_budget_allocation';

    /**
     * @var array
     */
    protected $fillable = ['amount', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function requirement()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Requirement', 'requirement_id', 'requirement_id');
    }
}