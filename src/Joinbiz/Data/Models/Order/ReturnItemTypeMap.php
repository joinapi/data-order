<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $return_item_map_key
 * @property string $return_header_type_id
 * @property string $return_item_type_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ReturnHeaderType $returnHeaderType
 */
class ReturnItemTypeMap extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'return_item_type_map';

    /**
     * @var array
     */
    protected $fillable = ['return_item_type_id', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function returnHeaderType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ReturnHeaderType', 'return_header_type_id', 'return_header_type_id');
    }
}
