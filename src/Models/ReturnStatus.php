<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $return_status_id
 * @property string $status_id
 * @property string $return_id
 * @property string $change_by_user_login_id
 * @property string $return_item_seq_id
 * @property string $status_datetime
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ReturnHeader $returnHeader
 * @property StatusItem $statusItem
 * @property UserLogin $userLoginByChangeByUserLoginId
 */
class ReturnStatus extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'return_status';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'return_status_id';

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
    protected $fillable = ['status_id', 'return_id', 'change_by_user_login_id', 'return_item_seq_id', 'status_datetime', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

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
