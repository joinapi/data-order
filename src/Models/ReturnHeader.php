<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $return_id
 * @property string $return_header_type_id
 * @property string $status_id
 * @property string $from_party_id
 * @property string $to_party_id
 * @property string $payment_method_id
 * @property string $fin_account_id
 * @property string $billing_account_id
 * @property string $origin_contact_mech_id
 * @property string $destination_facility_id
 * @property string $currency_uom_id
 * @property string $created_by
 * @property string $entry_date
 * @property string $needs_inventory_receive
 * @property string $supplier_rma_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ReturnStatus[] $returnStatuses
 * @property ReturnItemShipment[] $returnItemShipments
 * @property ReturnItemBilling[] $returnItemBillings
 * @property ReturnContactMech[] $returnContactMeches
 * @property ReturnAdjustment[] $returnAdjustments
 * @property CommunicationEventReturn[] $communicationEventReturns
 * @property ReturnItem[] $returnItems
 * @property Shipment[] $shipmentsByPrimaryReturnId
 * @property ContactMech $contactMechByOriginContactMechId
 * @property Party $partyByFromPartyId
 * @property Uom $uomByCurrencyUomId
 * @property ReturnHeaderType $returnHeaderType
 * @property StatusItem $statusItem
 * @property BillingAccount $billingAccount
 * @property Facility $facilityByDestinationFacilityId
 * @property FinAccount $finAccount
 * @property Party $partyByToPartyId
 * @property PaymentMethod $paymentMethod
 * @property TrackingCodeOrderReturn[] $trackingCodeOrderReturns
 */
class ReturnHeader extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'return_header';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'return_id';

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
    protected $fillable = ['return_header_type_id', 'status_id', 'from_party_id', 'to_party_id', 'payment_method_id', 'fin_account_id', 'billing_account_id', 'origin_contact_mech_id', 'destination_facility_id', 'currency_uom_id', 'created_by', 'entry_date', 'needs_inventory_receive', 'supplier_rma_id', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnStatuses()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ReturnStatus', 'return_id', 'return_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnItemShipments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ReturnItemShipment', 'return_id', 'return_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnItemBillings()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ReturnItemBilling', 'return_id', 'return_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnContactMeches()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ReturnContactMech', 'return_id', 'return_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnAdjustments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ReturnAdjustment', 'return_id', 'return_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function communicationEventReturns()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\CommunicationEventReturn', 'return_id', 'return_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnItems()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ReturnItem', 'return_id', 'return_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipmentsByPrimaryReturnId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\Shipment', 'primary_return_id', 'return_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contactMechByOriginContactMechId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ContactMech', 'origin_contact_mech_id', 'contact_mech_id');
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
    public function uomByCurrencyUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Uom', 'currency_uom_id', 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function returnHeaderType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ReturnHeaderType', 'return_header_type_id', 'return_header_type_id');
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
    public function billingAccount()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\BillingAccount', 'billing_account_id', 'billing_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facilityByDestinationFacilityId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Facility', 'destination_facility_id', 'facility_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function finAccount()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\FinAccount', 'fin_account_id', 'fin_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partyByToPartyId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Party', 'to_party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethod()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\PaymentMethod', 'payment_method_id', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trackingCodeOrderReturns()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\TrackingCodeOrderReturn', 'return_id', 'return_id');
    }
}
