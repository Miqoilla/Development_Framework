<?php

namespace App\Models;

use App\Models\RakBuku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buku extends Model
{
    // use HasFactory;
    protected $table = 'buku';

    public function rakBuku(): BelongsTo
    {
        return $this->belongsTo(RakBuku::class, 'id_rak_buku');
    }

    protected $guarded = ['id'];
}
