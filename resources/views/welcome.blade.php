@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if($projects)
                @foreach($projects as $project)
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <ul class="icon-bar">
                                <li> @include('projects._deleteForm')</li>
                                <li>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-mg" data-toggle="modal" data-target="#editModal-{{ $project->id }}">
                                        <i class="fa fa-btn fa-cog"></i>
                                    </button>
                                </li>
                            </ul>
                            <a href="{{ route('projects.show',$project->name) }}">
                                <img src="/thumbnails/{{ $project->thumbnail ? $project->thumbnail : 'flower.jpg' }}" alt="{{ $project->name }}">
                            </a>
                            <div class="caption">
                                <a href="{{ route('projects.show',$project->name) }}">
                                    <h4 class="text-center">{{ $project->name }}</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    @include('projects._editModel')
                @endforeach
            @endif
            <div class="project-model col-sm-6 col-md-3">
                @include('projects._createProjectModal')
            </div>
        </div>
    </div>
@endsection

@section('customJS')
    <script>
        $(document).ready(function(){
            $('.icon-bar').hide();
            $('.thumbnail').hover(function(){
                $(this).find('.icon-bar').toggle();
            });
        });
    </script>
@endsection
