<?php

namespace App\Models;

use Carbon\Carbon;
use \DateTimeInterface;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Candidate extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $table = "candidates";

    protected $appends = [
        'transaction',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'dob'
    ];


    protected $fillable = [
        'manager_name',
        'team_name',
        'dob',
        'gender',
        'fan_club',
        'linkby',
        'email',
        'phone',
        'bank',
        'account_no',
        'status',
        'term'
    ];
    
    public function getDobAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }
    
    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.datetime_format')) : null;
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->crop(Manipulations::CROP_CENTER, 80, 80);
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
    
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-m-Y H:i:s');
    }

    public static function getCandidate()
    {
        $records = DB::table('candidates')->select('id', 'manager_name', 'team_name', 'dob', 'gender', 'fan_club', 'linkby', 'email', 'phone', 'bank', 'account_no', 'created_at')->get()->toArray();
        return $records;
    }
}
