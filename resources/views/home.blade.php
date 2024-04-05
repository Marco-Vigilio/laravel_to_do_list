@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Oggi
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <ul class="list-group list-group-flush">
                        @foreach ($tasks as $task)
                        <li class="list-group-item">
                            {{ $task->task }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <form action="{{ route('home')}}" method="POST" enctype="multipart/form-data">
                @csrf

                @error('task')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                <div class="my-3">
                    <input type="text" class="form-control" id="task" placeholder="Insert your task" name="task" value="{{ old('task', '')}}">
                </div>



                <div class="mb-3">
                    <button type="submit">
                        Create new task
                    </button>
                    <button type="reset">
                        Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection