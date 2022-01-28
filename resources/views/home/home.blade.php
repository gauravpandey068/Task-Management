@extends('base')

@section('title')
    Home
@endsection

@section('content')

    <div class="card mt-4 ">
        <div class="card-body">
            <form action="" method="post">
                <div class="mt-3 mb-3">
                    <textarea class="form-control" name="task" id="exampleFormControlTextarea1" rows="3"
                              placeholder="Your Task Here!" required></textarea>
                </div>
                <div class="mt-3 mb-3">
                    <button type="submit" class="btn btn-primary">Add Task</button>
            </form>
        </div>
    </div>

@endsection
