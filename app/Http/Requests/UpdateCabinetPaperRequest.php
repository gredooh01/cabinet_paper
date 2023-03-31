<?php

namespace App\Http\Requests;

use App\Models\CabinetPaper;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCabinetPaperRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cabinet_paper_edit');
    }

    public function rules()
    {
        return [
            'cabinet_type' => [
                'required',
            ],
            'cabinet_num' => [
                'string',
                'required',
            ],
            'cabinet_title' => [
                'string',
                'required',
            ],
            'cabinet_ministry' => [
                'string',
                'required',
            ],
            'issue_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'dispatch_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'archive_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
