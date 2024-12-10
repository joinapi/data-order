<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $cust_request_id
 * @property string $cust_request_type_id
 * @property string $cust_request_category_id
 * @property string $status_id
 * @property string $from_party_id
 * @property string $maximum_amount_uom_id
 * @property string $product_store_id
 * @property string $sales_channel_enum_id
 * @property string $fulfill_contact_mech_id
 * @property string $currency_uom_id
 * @property float $priority
 * @property string $cust_request_date
 * @property string $response_required_date
 * @property string $cust_request_name
 * @property string $description
 * @property string $open_date_time
 * @property string $closed_date_time
 * @property string $internal_comment
 * @property string $reason
 * @property string $created_date
 * @property string $created_by_user_login
 * @property string $last_modified_date
 * @property string $last_modified_by_user_login
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property CustRequestWorkEffort[] $custRequestWorkEfforts
 * @property Uom $uomByMaximumAmountUomId
 * @property CustRequestCategory $custRequestCategory
 * @property Enumeration $enumerationBySalesChannelEnumId
 * @property Uom $uomByCurrencyUomId
 * @property Party $partyByFromPartyId
 * @property ContactMech $contactMechByFulfillContactMechId
 * @property ProductStore $productStore
 * @property StatusItem $statusItem
 * @property CustRequestType $custRequestType
 * @property QuoteItem[] $quoteItems
 * @property CustRequestItem[] $custRequestItems
 * @property RespondingParty[] $respondingParties
 * @property CustRequestAttribute[] $custRequestAttributes
 * @property CustRequestCommEvent[] $custRequestCommEvents
 * @property CustRequestContent[] $custRequestContents
 * @property CustRequestNote[] $custRequestNotes
 * @property CustRequestParty[] $custRequestParties
 * @property CustRequestStatus[] $custRequestStatuses
 */
class CustRequest extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cust_request';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'cust_request_id';

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
    protected $fillable = ['cust_request_type_id', 'cust_request_category_id', 'status_id', 'from_party_id', 'maximum_amount_uom_id', 'product_store_id', 'sales_channel_enum_id', 'fulfill_contact_mech_id', 'currency_uom_id', 'priority', 'cust_request_date', 'response_required_date', 'cust_request_name', 'description', 'open_date_time', 'closed_date_time', 'internal_comment', 'reason', 'created_date', 'created_by_user_login', 'last_modified_date', 'last_modified_by_user_login', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function custRequestWorkEfforts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\CustRequestWorkEffort', 'cust_request_id', 'cust_request_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByMaximumAmountUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Uom', 'maximum_amount_uom_id', 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function custRequestCategory()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\CustRequestCategory', 'cust_request_category_id', 'cust_request_category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enumerationBySalesChannelEnumId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Enumeration', 'sales_channel_enum_id', 'enum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByCurrencyUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Uom', 'currency_uom_id', 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partyByFromPartyId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Party', 'from_party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contactMechByFulfillContactMechId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ContactMech', 'fulfill_contact_mech_id', 'contact_mech_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productStore()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ProductStore', 'product_store_id', 'product_store_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\StatusItem', 'status_id', 'status_id');
    }

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
    public function quoteItems()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\QuoteItem', 'cust_request_id', 'cust_request_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function custRequestItems()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\CustRequestItem', 'cust_request_id', 'cust_request_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function respondingParties()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\RespondingParty', 'cust_request_id', 'cust_request_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function custRequestAttributes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\CustRequestAttribute', 'cust_request_id', 'cust_request_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function custRequestCommEvents()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\CustRequestCommEvent', 'cust_request_id', 'cust_request_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function custRequestContents()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\CustRequestContent', 'cust_request_id', 'cust_request_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function custRequestNotes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\CustRequestNote', 'cust_request_id', 'cust_request_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function custRequestParties()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\CustRequestParty', 'cust_request_id', 'cust_request_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function custRequestStatuses()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\CustRequestStatus', 'cust_request_id', 'cust_request_id');
    }
}
