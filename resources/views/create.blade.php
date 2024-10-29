<?php
/**
 * Project: laravel_task_manager
 * File: dashboard.blade.php
 * Created: 11/20/22
 * Author: Abdullah Al Mamun <mamun1214@gmail.com>
 */
?>
@extends('layout.app')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card mt-3">
        <div class="card-header">
            <h1>Add New Task</h1>
            <span>{{route('task.store')}}</span>
            <br>
            <span>{{url('/tasks') }}</span>
        </div>
        <div class="card-body bg-light">
            <form name="new-task" method="post" action="{{route('task.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Task name</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control" placeholder="Enter task name" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Task Priority</label>
                    <input type="number" id="priority"  name="priority" value="{{ old('priority') }}" class="form-control" placeholder="Enter task priority" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection








