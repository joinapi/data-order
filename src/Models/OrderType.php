<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $order_type_id
 * @property string $parent_type_id
 * @property string $has_table
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property OrderHeader[] $orderHeaders
 * @property OrderTypeAttr[] $orderTypeAttrs
 * @property PartyPrefDocTypeTpl[] $partyPrefDocTypeTpls
 * @property OrderType $orderTypeByParentTypeId
 */
class OrderType extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_type';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'order_type_id';

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
    protected $fillable = ['parent_type_id', 'has_table', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderHeaders()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderHeader', 'order_type_id', 'order_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderTypeAttrs()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderTypeAttr', 'order_type_id', 'order_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partyPrefDocTypeTpls()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\PartyPrefDocTypeTpl', 'order_type_id', 'order_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderTypeByParentTypeId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\OrderType', 'parent_type_id', 'order_type_id');
    }
}
