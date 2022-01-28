@extends('base')

@section('title')
    Update
@endsection

@section('content')

    <div class="card mt-4 ">
        <div class="card-body">
            <form action="{{route('home.update.success', $task->id)}}" method="post">
                @csrf
                @method('PATCH')
                <div class="mt-3 mb-3">
                    <textarea class="form-control" name="task" id="exampleFormControlTextarea1" rows="3"
                              placeholder="Your Task Here!" required>{{$task->task}}</textarea>
                </div>
                <div class="mt-3 mb-3">
                    <button type="submit" class="btn btn-primary">Update Task</button>
                </div>
            </form>
        </div>
    </div>

@endsection
