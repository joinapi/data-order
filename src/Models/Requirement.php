<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $requirement_id
 * @property string $requirement_type_id
 * @property string $facility_id
 * @property string $deliverable_id
 * @property string $fixed_asset_id
 * @property string $product_id
 * @property string $status_id
 * @property string $description
 * @property string $requirement_start_date
 * @property string $required_by_date
 * @property float $estimated_budget
 * @property float $quantity
 * @property string $use_case
 * @property string $reason
 * @property string $created_date
 * @property string $created_by_user_login
 * @property string $last_modified_date
 * @property string $last_modified_by_user_login
 * @property string $facility_id_to
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property DesiredFeature[] $desiredFeatures
 * @property Deliverable $deliverable
 * @property Facility $facility
 * @property FixedAsset $fixedAsset
 * @property Product $product
 * @property StatusItem $statusItem
 * @property RequirementType $requirementType
 * @property RequirementStatus[] $requirementStatuses
 * @property RequirementRole[] $requirementRoles
 * @property RequirementCustRequest[] $requirementCustRequests
 * @property RequirementBudgetAllocation[] $requirementBudgetAllocations
 * @property RequirementAttribute[] $requirementAttributes
 * @property OrderRequirementCommitment[] $orderRequirementCommitments
 * @property WorkRequirementFulfillment[] $workRequirementFulfillments
 */
class Requirement extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'requirement';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'requirement_id';

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
    protected $fillable = ['requirement_type_id', 'facility_id', 'deliverable_id', 'fixed_asset_id', 'product_id', 'status_id', 'description', 'requirement_start_date', 'required_by_date', 'estimated_budget', 'quantity', 'use_case', 'reason', 'created_date', 'created_by_user_login', 'last_modified_date', 'last_modified_by_user_login', 'facility_id_to', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function desiredFeatures()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\DesiredFeature', 'requirement_id', 'requirement_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function deliverable()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Deliverable', 'deliverable_id', 'deliverable_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facility()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Facility', 'facility_id', 'facility_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fixedAsset()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\FixedAsset', 'fixed_asset_id', 'fixed_asset_id');
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
    public function statusItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\StatusItem', 'status_id', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function requirementType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\RequirementType', 'requirement_type_id', 'requirement_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requirementStatuses()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\RequirementStatus', 'requirement_id', 'requirement_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requirementRoles()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\RequirementRole', 'requirement_id', 'requirement_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requirementCustRequests()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\RequirementCustRequest', 'requirement_id', 'requirement_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requirementBudgetAllocations()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\RequirementBudgetAllocation', 'requirement_id', 'requirement_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requirementAttributes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\RequirementAttribute', 'requirement_id', 'requirement_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderRequirementCommitments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderRequirementCommitment', 'requirement_id', 'requirement_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workRequirementFulfillments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\WorkRequirementFulfillment', 'requirement_id', 'requirement_id');
    }
}
