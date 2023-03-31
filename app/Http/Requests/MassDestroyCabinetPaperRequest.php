<?php

namespace App\Http\Requests;

use App\Models\CabinetPaper;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCabinetPaperRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cabinet_paper_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:cabinet_papers,id',
        ];
    }
}
