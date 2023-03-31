<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CabinetPaper extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'cabinet_papers';

    protected $dates = [
        'issue_date',
        'dispatch_date',
        'archive_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const CABINET_TYPE_SELECT = [
        'information' => 'Information',
        'memo'        => 'Memo',
        'minute'      => 'Minute',
        'submission'  => 'Submission',
    ];

    protected $fillable = [
        'cabinet_type',
        'cabinet_num',
        'cabinet_title',
        'cabinet_ministry',
        'issue_date',
        'dispatch_date',
        'archive_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getIssueDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setIssueDateAttribute($value)
    {
        $this->attributes['issue_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDispatchDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDispatchDateAttribute($value)
    {
        $this->attributes['dispatch_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getArchiveDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setArchiveDateAttribute($value)
    {
        $this->attributes['archive_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
