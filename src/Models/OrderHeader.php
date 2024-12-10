<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $order_id
 * @property string $order_type_id
 * @property string $sales_channel_enum_id
 * @property string $status_id
 * @property string $created_by
 * @property string $currency_uom
 * @property string $sync_status_id
 * @property string $billing_account_id
 * @property string $origin_facility_id
 * @property string $web_site_id
 * @property string $product_store_id
 * @property string $auto_order_shopping_list_id
 * @property string $order_name
 * @property string $external_id
 * @property string $order_date
 * @property string $priority
 * @property string $entry_date
 * @property string $pick_sheet_printed_date
 * @property string $visit_id
 * @property string $first_attempt_order_id
 * @property string $agreement_id
 * @property string $terminal_id
 * @property string $transaction_id
 * @property string $needs_inventory_issuance
 * @property string $is_rush_order
 * @property string $internal_code
 * @property float $remaining_sub_total
 * @property float $grand_total
 * @property string $is_viewed
 * @property string $invoice_per_shipment
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ProductPromoUse[] $productPromice
 * @property ShoppingList $shoppingListByAutoOrderShoppingListId
 * @property BillingAccount $billingAccount
 * @property UserLogin $userLoginByCreatedBy
 * @property Uom $uomByCurrencyUom
 * @property Facility $facilityByOriginFacilityId
 * @property ProductStore $productStore
 * @property Enumeration $enumerationBySalesChannelEnumId
 * @property StatusItem $statusItem
 * @property StatusItem $statusItemBySyncStatusId
 * @property OrderType $orderType
 * @property WebSite $webSite
 * @property OrderPaymentPreference[] $orderPaymentPreferences
 * @property FixedAsset[] $fixedAssetsByAcquireOrderId
 * @property ProductOrderItem[] $productOrderItemsByEngagementId
 * @property ProductOrderItem[] $productOrderItems
 * @property OrderItemGroup[] $orderItemGroups
 * @property OrderItem[] $orderItems
 * @property GiftCardFulfillment[] $giftCardFulfillments
 * @property OrderAdjustment[] $orderAdjustments
 * @property OrderAttribute[] $orderAttributes
 * @property OrderContactMech[] $orderContactMeches
 * @property OrderContent[] $orderContents
 * @property OrderDeliverySchedule[] $orderDeliverySchedules
 * @property OrderHeaderNote[] $orderHeaderNotes
 * @property OrderHeaderWorkEffort[] $orderHeaderWorkEfforts
 * @property OrderItemAssoc[] $orderItemAssocs
 * @property OrderItemAssoc[] $orderItemAssocsByToOrderId
 * @property OrderItemBilling[] $orderItemBillings
 * @property OrderItemRole[] $orderItemRoles
 * @property OrderItemShipGroupAssoc[] $orderItemShipGroupAssocs
 * @property OrderNotification[] $orderNotifications
 * @property OrderProductPromoCode[] $orderProductPromoCodes
 * @property OrderRequirementCommitment[] $orderRequirementCommitments
 * @property OrderRole[] $orderRoles
 * @property OrderShipment[] $orderShipments
 * @property OrderStatus[] $orderStatuses
 * @property OrderTerm[] $orderTerms
 * @property ReturnItem[] $returnItems
 * @property ReturnItemResponse[] $returnItemResponsesByReplacementOrderId
 * @property CommunicationEventOrder[] $communicationEventOrders
 * @property Shipment[] $shipmentsByPrimaryOrderId
 * @property OrderItemShipGroup[] $orderItemShipGroups
 * @property FixedAssetMaint[] $fixedAssetMaintsByPurchaseOrderId
 * @property FixedAssetMaintOrder[] $fixedAssetMaintOrders
 * @property TrackingCodeOrder[] $trackingCodeOrders
 * @property TrackingCodeOrderReturn[] $trackingCodeOrderReturns
 * @property WorkOrderItemFulfillment[] $workOrderItemFulfillments
 */
class OrderHeader extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_header';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'order_id';

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
    protected $fillable = ['order_type_id', 'sales_channel_enum_id', 'status_id', 'created_by', 'currency_uom', 'sync_status_id', 'billing_account_id', 'origin_facility_id', 'web_site_id', 'product_store_id', 'auto_order_shopping_list_id', 'order_name', 'external_id', 'order_date', 'priority', 'entry_date', 'pick_sheet_printed_date', 'visit_id', 'first_attempt_order_id', 'agreement_id', 'terminal_id', 'transaction_id', 'needs_inventory_issuance', 'is_rush_order', 'internal_code', 'remaining_sub_total', 'grand_total', 'is_viewed', 'invoice_per_shipment', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productPromice()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ProductPromoUse', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shoppingListByAutoOrderShoppingListId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ShoppingList', 'auto_order_shopping_list_id', 'shopping_list_id');
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
    public function userLoginByCreatedBy()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\UserLogin', 'created_by', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByCurrencyUom()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Uom', 'currency_uom', 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facilityByOriginFacilityId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Facility', 'origin_facility_id', 'facility_id');
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
    public function enumerationBySalesChannelEnumId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\Enumeration', 'sales_channel_enum_id', 'enum_id');
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
    public function statusItemBySyncStatusId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\StatusItem', 'sync_status_id', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\OrderType', 'order_type_id', 'order_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function webSite()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\WebSite', 'web_site_id', 'web_site_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderPaymentPreferences()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderPaymentPreference', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fixedAssetsByAcquireOrderId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\FixedAsset', 'acquire_order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productOrderItemsByEngagementId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ProductOrderItem', 'engagement_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productOrderItems()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ProductOrderItem', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItemGroups()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderItemGroup', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderItem', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function giftCardFulfillments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\GiftCardFulfillment', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderAdjustments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderAdjustment', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderAttributes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderAttribute', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderContactMeches()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderContactMech', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderContents()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderContent', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderDeliverySchedules()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderDeliverySchedule', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderHeaderNotes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderHeaderNote', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderHeaderWorkEfforts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderHeaderWorkEffort', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItemAssocs()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderItemAssoc', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItemAssocsByToOrderId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderItemAssoc', 'to_order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItemBillings()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderItemBilling', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItemRoles()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderItemRole', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItemShipGroupAssocs()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderItemShipGroupAssoc', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderNotifications()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderNotification', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderProductPromoCodes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderProductPromoCode', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderRequirementCommitments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderRequirementCommitment', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderRoles()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderRole', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderShipments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderShipment', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderStatuses()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderStatus', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderTerms()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderTerm', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnItems()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ReturnItem', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnItemResponsesByReplacementOrderId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ReturnItemResponse', 'replacement_order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function communicationEventOrders()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\CommunicationEventOrder', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipmentsByPrimaryOrderId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\Shipment', 'primary_order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItemShipGroups()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderItemShipGroup', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fixedAssetMaintsByPurchaseOrderId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\FixedAssetMaint', 'purchase_order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fixedAssetMaintOrders()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\FixedAssetMaintOrder', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trackingCodeOrders()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\TrackingCodeOrder', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trackingCodeOrderReturns()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\TrackingCodeOrderReturn', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workOrderItemFulfillments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\WorkOrderItemFulfillment', 'order_id', 'order_id');
    }
}
