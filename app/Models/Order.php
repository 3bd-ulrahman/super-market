<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $user_id
 * @property string $subtotal
 * @property string $delivery_fee
 * @property string $total
 * @property string $delivery_address
 * @property OrderStatus $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[UseFactory(OrderFactory::class)]
class Order extends Model
{
    /** @use HasFactory<OrderFactory> */
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'subtotal',
        'delivery_fee',
        'total',
        'delivery_address',
        'status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'subtotal' => 'decimal:2',
            'delivery_fee' => 'decimal:2',
            'total' => 'decimal:2',
            'status' => OrderStatus::class,
        ];
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany<OrderItem, $this>
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
