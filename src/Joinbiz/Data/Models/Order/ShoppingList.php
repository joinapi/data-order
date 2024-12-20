<?php

namespace Joinbiz\Data\Models\Order;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $shopping_list_id
 * @property string $shopping_list_type_id
 * @property string $parent_shopping_list_id
 * @property string $product_store_id
 * @property string $party_id
 * @property string $shipment_method_type_id
 * @property string $carrier_party_id
 * @property string $carrier_role_type_id
 * @property string $contact_mech_id
 * @property string $payment_method_id
 * @property string $recurrence_info_id
 * @property string $product_promo_code_id
 * @property string $visitor_id
 * @property string $list_name
 * @property string $description
 * @property string $is_public
 * @property string $is_active
 * @property string $currency_uom
 * @property string $last_ordered_date
 * @property string $last_admin_modified
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ShoppingListWorkEffort[] $shoppingListWorkEfforts
 * @property OrderHeader[] $orderHeadersByAutoOrderShoppingListId
 * @property ShoppingListItemSurvey[] $shoppingListItemSurveys
 * @property ShoppingListItem[] $shoppingListItems
 * @property ContactMech $contactMech
 * @property ShoppingList $shoppingListByParentShoppingListId
 * @property ProductStore $productStore
 * @property ProductPromoCode $productPromoCode
 * @property Party $party
 * @property PaymentMethod $paymentMethod
 * @property RecurrenceInfo $recurrenceInfo
 * @property ShoppingListType $shoppingListType
 */
class ShoppingList extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'shopping_list';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'shopping_list_id';

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
    protected $fillable = ['shopping_list_type_id', 'parent_shopping_list_id', 'product_store_id', 'party_id', 'shipment_method_type_id', 'carrier_party_id', 'carrier_role_type_id', 'contact_mech_id', 'payment_method_id', 'recurrence_info_id', 'product_promo_code_id', 'visitor_id', 'list_name', 'description', 'is_public', 'is_active', 'currency_uom', 'last_ordered_date', 'last_admin_modified', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shoppingListWorkEfforts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ShoppingListWorkEffort', 'shopping_list_id', 'shopping_list_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderHeadersByAutoOrderShoppingListId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderHeader', 'auto_order_shopping_list_id', 'shopping_list_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shoppingListItemSurveys()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ShoppingListItemSurvey', 'shopping_list_id', 'shopping_list_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shoppingListItems()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ShoppingListItem', 'shopping_list_id', 'shopping_list_id');
    }

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
    public function shoppingListByParentShoppingListId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ShoppingList', 'parent_shopping_list_id', 'shopping_list_id');
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
    public function productPromoCode()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Product\ProductPromoCode', 'product_promo_code_id', 'product_promo_code_id');
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
    public function paymentMethod()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentMethod', 'payment_method_id', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recurrenceInfo()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Service\RecurrenceInfo', 'recurrence_info_id', 'recurrence_info_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shoppingListType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\ShoppingListType', 'shopping_list_type_id', 'shopping_list_type_id');
    }
}
