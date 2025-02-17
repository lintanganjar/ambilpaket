<?php

namespace App\Models;

use App\Models\Scopes\AgenSubmissionScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgenSubmissions extends Model
{
    use HasFactory;

    protected $table = 'agen_submissions';

    protected $fillable = [
        'agen_first_name',
        'agen_last_name',
        'agen_phone_number',
        'agen_email',
        'agen_password',
        'agen_province_id',
        'agen_regency_id',
        'agen_district_id',
        'agen_full_address',
        'latitude',
        'longitude',
        'building_type',
        'building_status',
        'location',
        'ktp_img',
        'npwp_img',
        'akta_pendiri_perusahaan_img',
        'suket_domisili_usaha_img',
        'surat_izin_usaha_perusahaan_img',
        'location_img',
        'building_condition_img',
        'approval',
        'bank_name',
        'account_name',
        'account_number',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new AgenSubmissionScope);
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'agen_province_id');
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'agen_regency_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'agen_district_id');
    }
}
