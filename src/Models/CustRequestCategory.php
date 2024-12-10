<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $cust_request_category_id
 * @property string $cust_request_type_id
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property CustRequestType $custRequestType
 * @property CustRequest[] $custRequests
 */
class CustRequestCategory extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cust_request_category';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'cust_request_category_id';

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
    protected $fillable = ['cust_request_type_id', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function custRequestType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\CustRequestType', 'cust_request_type_id', 'cust_request_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function custRequests()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\CustRequest', 'cust_request_category_id', 'cust_request_category_id');
    }
}
