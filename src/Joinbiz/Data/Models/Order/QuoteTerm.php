<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $term_type_id
 * @property string $quote_id
 * @property string $quote_item_seq_id
 * @property float $term_value
 * @property string $uom_id
 * @property float $term_days
 * @property string $text_value
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Quote $quote
 * @property TermType $termType
 */
class QuoteTerm extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'quote_term';

    /**
     * @var array
     */
    protected $fillable = ['term_value', 'uom_id', 'term_days', 'text_value', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quote()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Quote', 'quote_id', 'quote_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function termType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\TermType', 'term_type_id', 'term_type_id');
    }
}
