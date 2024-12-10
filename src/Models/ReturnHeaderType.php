<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $return_header_type_id
 * @property string $parent_type_id
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ReturnItemTypeMap[] $returnItemTypeMaps
 * @property ReturnHeader[] $returnHeaders
 * @property ReturnHeaderType $returnHeaderTypeByParentTypeId
 */
class ReturnHeaderType extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'return_header_type';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'return_header_type_id';

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
    protected $fillable = ['parent_type_id', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnItemTypeMaps()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ReturnItemTypeMap', 'return_header_type_id', 'return_header_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnHeaders()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ReturnHeader', 'return_header_type_id', 'return_header_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function returnHeaderTypeByParentTypeId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ReturnHeaderType', 'parent_type_id', 'return_header_type_id');
    }
}
