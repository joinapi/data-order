<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $accommodation_spot_id
 * @property string $accommodation_class_id
 * @property string $fixed_asset_id
 * @property float $number_of_spaces
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property AccommodationClass $accommodationClass
 * @property FixedAsset $fixedAsset
 */
class AccommodationSpot extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'accommodation_spot';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'accommodation_spot_id';

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
    protected $fillable = ['accommodation_class_id', 'fixed_asset_id', 'number_of_spaces', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accommodationClass()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\AccommodationClass', 'accommodation_class_id', 'accommodation_class_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fixedAsset()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\FixedAsset', 'fixed_asset_id', 'fixed_asset_id');
    }
}
