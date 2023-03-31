<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCabinetPaperRequest;
use App\Http\Requests\StoreCabinetPaperRequest;
use App\Http\Requests\UpdateCabinetPaperRequest;
use App\Models\CabinetPaper;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CabinetPaperController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cabinet_paper_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cabinetPapers = CabinetPaper::all();

        return view('admin.cabinetPapers.index', compact('cabinetPapers'));
    }

    public function create()
    {
        abort_if(Gate::denies('cabinet_paper_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cabinetPapers.create');
    }

    public function store(StoreCabinetPaperRequest $request)
    {
        $cabinetPaper = CabinetPaper::create($request->all());

        return redirect()->route('admin.cabinet-papers.index');
    }

    public function edit(CabinetPaper $cabinetPaper)
    {
        abort_if(Gate::denies('cabinet_paper_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cabinetPapers.edit', compact('cabinetPaper'));
    }

    public function update(UpdateCabinetPaperRequest $request, CabinetPaper $cabinetPaper)
    {
        $cabinetPaper->update($request->all());

        return redirect()->route('admin.cabinet-papers.index');
    }

    public function show(CabinetPaper $cabinetPaper)
    {
        abort_if(Gate::denies('cabinet_paper_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cabinetPapers.show', compact('cabinetPaper'));
    }

    public function destroy(CabinetPaper $cabinetPaper)
    {
        abort_if(Gate::denies('cabinet_paper_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cabinetPaper->delete();

        return back();
    }

    public function massDestroy(MassDestroyCabinetPaperRequest $request)
    {
        $cabinetPapers = CabinetPaper::find(request('ids'));

        foreach ($cabinetPapers as $cabinetPaper) {
            $cabinetPaper->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
