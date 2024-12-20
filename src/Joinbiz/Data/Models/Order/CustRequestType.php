<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $cust_request_type_id
 * @property string $parent_type_id
 * @property string $party_id
 * @property string $has_table
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property CustRequestTypeAttr[] $custRequestTypeAttrs
 * @property Party $party
 * @property CustRequestType $custRequestTypeByParentTypeId
 * @property CustRequestCategory[] $custRequestCategories
 * @property CustRequest[] $custRequests
 * @property CustRequestResolution[] $custRequestResolutions
 */
class CustRequestType extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cust_request_type';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'cust_request_type_id';

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
    protected $fillable = ['parent_type_id', 'party_id', 'has_table', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function custRequestTypeAttrs()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\CustRequestTypeAttr', 'cust_request_type_id', 'cust_request_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function party()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function custRequestTypeByParentTypeId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\CustRequestType', 'parent_type_id', 'cust_request_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function custRequestCategories()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\CustRequestCategory', 'cust_request_type_id', 'cust_request_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function custRequests()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\CustRequest', 'cust_request_type_id', 'cust_request_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function custRequestResolutions()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\CustRequestResolution', 'cust_request_type_id', 'cust_request_type_id');
    }
}
