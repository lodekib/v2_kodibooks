<?php

namespace App\Models;

use App\Traits\HasManager;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class Statement extends Model
{
    use HasFactory, HasManager;

    protected $guarded = [];



    protected static function booted()
    {
        static::addGlobalScope('nonestale', function (Builder $builder) {
            $builder->where(function ($query) {
                $query->whereExists(function ($subquery) {
                    $subquery->select(DB::raw(1))
                        ->from('invoices')
                        ->whereColumn('statements.reference', 'invoices.invoice_number')
                        ->where('invoices.invoice_status', 'not like', 'stale/%');
                })
                    ->orWhereExists(function ($subquery) {
                        $subquery->select(DB::raw(1))
                            ->from('payments')
                            ->whereColumn('statements.reference', 'payments.receipt_number')
                            ->where('payments.status', 'not like', 'stale/%');
                    });
            });
        });
    }
    public function invoice() : BelongsTo
    {
        return $this->belongsTo(Invoice::class, 'reference', 'invoice_number');
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class, 'reference', 'receipt_number');
    }

    public function getCustomDateAttribute()
    {
        if ($this->invoice) {
            return Carbon::parse($this->invoice->due_date)->toDateString();
        } elseif ($this->payment) {
            return Carbon::parse($this->payment->paid_date)->toDateString();
        } else {
            return  null;
        }
    }

    public function  tenant() : BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
}
