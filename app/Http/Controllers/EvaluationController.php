<?php

namespace App\Http\Controllers;

use App\AthleteData;
use App\AthleteSkillMatch;
use App\Match;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

class EvaluationController extends Controller
{
    private $model;

    /**
     * EvaluationController constructor.
     */
    public function __construct()
    {
        $this->model = new AthleteSkillMatch();
    }

    public function index()
    {
        $all = $this->model->all(['*']);

        return view('evaluation.index')->with('entities',$all);
    }

    public function edit($id)
    {
        $entity = $this->model->find($id,['*']);

        return view('evaluation.edit')->with('entity', $entity);
    }

    public function show($evalId)
    {
        $one = $this->model->find($evalId,['*']);
        return view('evaluation.show')->with('entity', $one);
    }

    public function store(Request $request)
    {
        $newModel = $this->model->create($request->except(['_token','_method']));

        return view('evaluation.show')->with('entity', $newModel);
    }

    public function update(Request $request, $id)
    {
        $oldModel = $this->model->find($id);
        $oldModel->update($request->except(['_token', '_method']));

        return view('evaluation.show')->with('entity', $this->model->find($id));
    }
}
