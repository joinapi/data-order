<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $order_item_assoc_type_id
 * @property string $parent_type_id
 * @property string $has_table
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property OrderItemAssoc[] $orderItemAssocs
 * @property OrderItemAssocType $orderItemAssocTypeByParentTypeId
 */
class OrderItemAssocType extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'order_item_assoc_type';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'order_item_assoc_type_id';

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
    public function orderItemAssocs()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderItemAssoc', 'order_item_assoc_type_id', 'order_item_assoc_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderItemAssocTypeByParentTypeId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\OrderItemAssocType', 'parent_type_id', 'order_item_assoc_type_id');
    }
}
