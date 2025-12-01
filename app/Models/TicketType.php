<?php

namespace App\Models;

use App\Enums\TicketTypeStatusEnum;
use App\Observers\TicketTypeObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $type
 * @property string $database_name
 * @property TicketTypeStatusEnum $migration_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketType query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketType whereDatabaseName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketType whereMigrationStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketType whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
#[ObservedBy([TicketTypeObserver::class])]
class TicketType extends Model
{
    /** @use HasFactory<\Database\Factories\TicketTypeFactory> */
    use HasFactory;

    protected $fillable = [
        'type',
        'database_name',
        'migration_status',
    ];

    protected function casts(): array
    {
        return [
            'migration_status' => TicketTypeStatusEnum::class,
        ];
    }

    public function scopeIsCompleted()
    {
        return $this->where('migration_status', TicketTypeStatusEnum::Completed);
    }
}
