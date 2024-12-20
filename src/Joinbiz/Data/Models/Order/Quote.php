<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $quote_id
 * @property string $quote_type_id
 * @property string $party_id
 * @property string $status_id
 * @property string $currency_uom_id
 * @property string $product_store_id
 * @property string $sales_channel_enum_id
 * @property string $issue_date
 * @property string $valid_from_date
 * @property string $valid_thru_date
 * @property string $quote_name
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property SalesOpportunityQuote[] $salesOpportunityQuotes
 * @property Enumeration $enumerationBySalesChannelEnumId
 * @property Uom $uomByCurrencyUomId
 * @property ProductStore $productStore
 * @property Party $party
 * @property QuoteType $quoteType
 * @property StatusItem $statusItem
 * @property QuoteItem[] $quoteItems
 * @property QuoteWorkEffort[] $quoteWorkEfforts
 * @property QuoteTerm[] $quoteTerms
 * @property QuoteRole[] $quoteRoles
 * @property QuoteNote[] $quoteNotes
 * @property QuoteCoefficient[] $quoteCoefficients
 * @property QuoteAttribute[] $quoteAttributes
 * @property QuoteAdjustment[] $quoteAdjustments
 */
class Quote extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'quote';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'quote_id';

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
    protected $fillable = ['quote_type_id', 'party_id', 'status_id', 'currency_uom_id', 'product_store_id', 'sales_channel_enum_id', 'issue_date', 'valid_from_date', 'valid_thru_date', 'quote_name', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salesOpportunityQuotes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Marketing\SalesOpportunityQuote', 'quote_id', 'quote_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enumerationBySalesChannelEnumId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\Enumeration', 'sales_channel_enum_id', 'enum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByCurrencyUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\Uom', 'currency_uom_id', 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productStore()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Product\ProductStore', 'product_store_id', 'product_store_id');
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
    public function quoteType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\QuoteType', 'quote_type_id', 'quote_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\StatusItem', 'status_id', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quoteItems()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\QuoteItem', 'quote_id', 'quote_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quoteWorkEfforts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\QuoteWorkEffort', 'quote_id', 'quote_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quoteTerms()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\QuoteTerm', 'quote_id', 'quote_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quoteRoles()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\QuoteRole', 'quote_id', 'quote_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quoteNotes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\QuoteNote', 'quote_id', 'quote_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quoteCoefficients()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\QuoteCoefficient', 'quote_id', 'quote_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quoteAttributes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\QuoteAttribute', 'quote_id', 'quote_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quoteAdjustments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\QuoteAdjustment', 'quote_id', 'quote_id');
    }
}
