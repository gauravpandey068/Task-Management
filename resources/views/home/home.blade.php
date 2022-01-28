@extends('base')

@section('title')
    Home
@endsection

@section('content')

    <div class="card mt-4 ">
        <div class="card-body">
            <form action="{{route('home')}}" method="post">
                @csrf
                <div class="mt-3 mb-3">
                    <textarea class="form-control" name="task" id="exampleFormControlTextarea1" rows="3"
                              placeholder="Your Task Here!" required></textarea>
                </div>
                <div class="mt-3 mb-3">
                    <button type="submit" class="btn btn-primary">Add Task</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card mt-4 mb-5">
        <div class="card-body">
            <h5 class="card-title text-center text-primary">Tasks</h5>
            @if($tasks->count())

                @foreach($tasks as $task)
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">{{$task->task}}</h5>
                            <p class="card-text">{{$task->created_at->diffForHumans()}}</p>
                            <span class="d-flex">
                                <a href="{{route('home.update', $task->id)}}" class="btn btn-primary ms-2 me-2">Edit</a>
                                <form action="{{ route('home.destroy', $task->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-block">Delete</button>
                                </form>

                            </span>
                        </div>
                    </div>
                @endforeach
                <div class="mt-5 mb-5">
                    {{$tasks->links()}}
                </div>


            @else
                <div class="card-footer bg-white mt-3">
                    <p class="text-center text-danger">No Task Founds!</p>
                </div>
            @endif

        </div>
    </div>

@endsection
