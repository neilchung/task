<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Image;
use App\Project;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreateProjectRequest;
use App\Repositories\ProjectsRepository;
use App\Http\Requests\EditProjectRequest;
use Carbon\Carbon;


class ProjectsController extends Controller
{

	protected $Repo;

	public function __construct(ProjectsRepository $repo)
	{
		$this->Repo = $repo;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  CreateProjectRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CreateProjectRequest $request)
	{
		$this->Repo->newProject($request);
		return Redirect::back();

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string $name
	 * @return \Illuminate\Http\Response
	 */
	public function show($name)
	{
		$project = Auth::user()->projects()->where('name', $name)->first();
		$toDo = $project->tasks()->where('completed', 0)->get();
		$Done = $project->tasks()->where('completed', 1)->get();
		$projects = Project::lists('name', 'id');
		return view('projects.show', compact('project', 'toDo', 'Done', 'projects'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param EditProjectRequest $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(EditProjectRequest $request, $id)
	{
		$this->Repo->updateProject($request, $id);
		return Redirect::back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$project = Project::find($id);
		$this->Repo->deleteThumbnail($project);
		$project->delete();
		return Redirect::back();
	}
}
