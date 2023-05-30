<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\DeviceRelay
 *
 * @property int $id
 * @property int $device_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Device $device
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceRelay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceRelay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceRelay query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceRelay whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceRelay whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceRelay whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceRelay whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceRelay whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DeviceRelay extends Model
{
    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class);
    }
}
