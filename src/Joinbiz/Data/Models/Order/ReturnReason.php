<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $return_reason_id
 * @property string $description
 * @property string $sequence_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ReturnItem[] $returnItems
 */
class ReturnReason extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'return_reason';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'return_reason_id';

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
    protected $fillable = ['description', 'sequence_id', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnItems()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ReturnItem', 'return_reason_id', 'return_reason_id');
    }
}