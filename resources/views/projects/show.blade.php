@extends('layouts.app') @section('content')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
    <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->

    <!-- Jumbotron -->
    <div class="well -well-lg">
        <h1>{{$project->name}}</h1>
        <p class="lead">{{$project->description}}</p>
        <!-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
    </div>

    <!-- Example row of columns -->
    <div class="row col-lg-12 col-md-12 col-sm-12" style="background: white; margin: 10px;">

        <!-- <a href="/projects/create/{{$project->id}}" class="pull-right btn btn-default btn-sm">Add Project</a> -->

        <br/>
        @include('partials.comments')

        <div class="row container-fluid">

            <form method="post" action="{{ route('comments.store') }}">
                {{ csrf_field() }}

                <input type="hidden" name="commentable_type" value="App\Project">
                <input type="hidden" name="commentable_id" value="{{$project->id}}">

                <div>

                    <div class="form-group">
                        <label for="comment-content">Comment</label>
                        <textarea placeholder="Enter comment" style="resize: vertical" id="comment-content" name="body" rows="3" spellcheck="false" class="form-control autosize-target text-left">
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for="comment-content">Proof of work done (Url/Photos)</label>
                        <textarea placeholder="Enter url or screenshots" style="resize: vertical" id="comment-content" name="url" rows="2" spellcheck="false" class="form-control autosize-target text-left">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit" />
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-sm-3 col-md-3 pull-right">
    <!--  <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> -->

    <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
            <li><a href="/projects/{{$project->id}}/edit">Edit</a></li>
            <li><a href="/projects/create">Create new project</a></li>
            <li><a href="/projects">My projects</a></li>

            <br/> @if($project->user_id == Auth::user()->id)

            <li>
                <a href="#" onclick="
                var result = confirm('Are you sure you wish to delete this project?');
                    if(result){
                      event.preventDefault();
                      document.getElementById('delete-form').submit();
                    }
                      ">
                Delete
              </a>
                <form id="delete-form" action="{{ route('projects.destroy',[$project->id]) }}" method="POST" style="display: none;">
                    <input type="hidden" name="_method" value="delete"> {{ csrf_field() }}
                </form>

            </li>
            @endif
            <!-- <li><a href="#">Add new member</a></li> -->
        </ol>
    </div>

    <div class="sidebar-module">
        <h4>Members</h4>
        <ol class="list-unstyled">
            <li>
                <a href="#"></a>
            </li>
        </ol>

    </div>

</div>

@endsection