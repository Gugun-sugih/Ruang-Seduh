namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name',
        'table_number',
        'order_date',
        'payment_method',
        'subtotal',
        'tax',
        'service',
        'total',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
