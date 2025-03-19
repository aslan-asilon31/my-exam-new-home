<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $table = 'pertanyaans';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'asesmen_id',
        'pertanyaan',
        'jenis',
        'durasi',
        'bobot',
        'dibuat_oleh',
        'diupdate_oleh',
        'tgl_dibuat',
        'tgl_diupdate',
        'no_urut',
        'apa_aktif',
    ];



    public function asesmen(): BelongsTo
    {
        return $this->belongsTo(Asesmen::class, 'asesmen_id');
    }
}
