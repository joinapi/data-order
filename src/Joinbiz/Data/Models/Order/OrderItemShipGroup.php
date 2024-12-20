<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $order_id
 * @property string $ship_group_seq_id
 * @property string $shipment_method_type_id
 * @property string $supplier_party_id
 * @property string $supplier_agreement_id
 * @property string $vendor_party_id
 * @property string $carrier_party_id
 * @property string $carrier_role_type_id
 * @property string $facility_id
 * @property string $contact_mech_id
 * @property string $telecom_contact_mech_id
 * @property string $tracking_number
 * @property string $shipping_instructions
 * @property string $may_split
 * @property string $gift_message
 * @property string $is_gift
 * @property string $ship_after_date
 * @property string $ship_by_date
 * @property string $estimated_ship_date
 * @property string $estimated_delivery_date
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ContactMech $contactMech
 * @property Party $partyByCarrierPartyId
 * @property Facility $facility
 * @property OrderHeader $orderHeader
 * @property PostalAddress $postalAddress
 * @property Agreement $agreementBySupplierAgreementId
 * @property ShipmentMethodType $shipmentMethodType
 * @property Party $partyBySupplierPartyId
 * @property TelecomNumber $telecomNumberByTelecomContactMechId
 * @property ContactMech $contactMechByTelecomContactMechId
 * @property Party $partyByVendorPartyId
 */
class OrderItemShipGroup extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'order_item_ship_group';

    /**
     * @var array
     */
    protected $fillable = ['shipment_method_type_id', 'supplier_party_id', 'supplier_agreement_id', 'vendor_party_id', 'carrier_party_id', 'carrier_role_type_id', 'facility_id', 'contact_mech_id', 'telecom_contact_mech_id', 'tracking_number', 'shipping_instructions', 'may_split', 'gift_message', 'is_gift', 'ship_after_date', 'ship_by_date', 'estimated_ship_date', 'estimated_delivery_date', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contactMech()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\ContactMech', 'contact_mech_id', 'contact_mech_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partyByCarrierPartyId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'carrier_party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facility()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Product\Facility', 'facility_id', 'facility_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderHeader()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\OrderHeader', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function postalAddress()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\PostalAddress', 'contact_mech_id', 'contact_mech_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agreementBySupplierAgreementId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Agreement', 'supplier_agreement_id', 'agreement_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipmentMethodType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\ShipmentMethodType', 'shipment_method_type_id', 'shipment_method_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partyBySupplierPartyId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'supplier_party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function telecomNumberByTelecomContactMechId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\TelecomNumber', 'telecom_contact_mech_id', 'contact_mech_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contactMechByTelecomContactMechId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\ContactMech', 'telecom_contact_mech_id', 'contact_mech_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partyByVendorPartyId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'vendor_party_id', 'party_id');
    }
}
