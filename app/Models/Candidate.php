<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Candidate extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    protected $table = "candidates";

    protected $appends = [
        'transaction',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    protected $fillable = [
        'manager_name',
        'team_name',
        'dob',
        'gender',
        'fan_club',
        'email',
        'phone',
        'bank',
        'account_name',
        'account_no',
        'ref_id',
        'status',
        'term'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 100, 100);
        $this->addMediaConversion('preview')->fit('crop', 150, 150);
    }
    
    public function getTransactionAttribute()
    {
        $file = $this->getMedia('transaction')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }
}
