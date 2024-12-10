<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $requirement_id
 * @property string $status_id
 * @property string $change_by_user_login_id
 * @property string $status_date
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Requirement $requirement
 * @property StatusItem $statusItem
 * @property UserLogin $userLoginByChangeByUserLoginId
 */
class RequirementStatus extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'requirement_status';

    /**
     * @var array
     */
    protected $fillable = ['change_by_user_login_id', 'status_date', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

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
    public function statusItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\StatusItem', 'status_id', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userLoginByChangeByUserLoginId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\UserLogin', 'change_by_user_login_id', 'user_login_id');
    }
}
