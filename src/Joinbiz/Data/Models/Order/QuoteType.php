<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $quote_type_id
 * @property string $parent_type_id
 * @property string $has_table
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property QuoteType $quoteTypeByParentTypeId
 * @property Quote[] $quotes
 * @property QuoteTypeAttr[] $quoteTypeAttrs
 * @property PartyPrefDocTypeTpl[] $partyPrefDocTypeTpls
 */
class QuoteType extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'quote_type';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'quote_type_id';

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quoteTypeByParentTypeId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\QuoteType', 'parent_type_id', 'quote_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quotes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\Quote', 'quote_type_id', 'quote_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quoteTypeAttrs()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\QuoteTypeAttr', 'quote_type_id', 'quote_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partyPrefDocTypeTpls()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PartyPrefDocTypeTpl', 'quote_type_id', 'quote_type_id');
    }
}
