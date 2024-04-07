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
                        @foreach ($tasks as $taskData)
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="border border-primary col-12 updateTaskSpan" style="cursor: pointer;">
                                <form class="updateTaskForm" action="{{route('task.update', $taskData)}}" class="d-inline form-terminator" method="POST" enctype="multipart/form-data">

                                    @csrf
                                    @method ('PUT')
                                    <span class="border border-secondary">
                                        {{ $taskData->task }}
                                    </span>

                                    <input type="hidden" name="id" value="{{ $taskData->id }}">
                                    <input type="hidden" name="task" value="{{ $taskData->task }}">
                                    <input type="hidden" name="done" value="{{ $taskData->done }}">
                                </form>
                            </span>
                            <form action="{{route('task.destroy', $taskData)}}" class="d-inline form-terminator" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $taskData->id }}">
                                <button type="submit" class="btn btn-sm btn-warning me-2">
                                    <i class="fa-regular fa-circle-xmark"></i>
                                </button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <form action="{{ route('task.store')}}" method="POST" enctype="multipart/form-data">
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