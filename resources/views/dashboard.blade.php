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
    <div class="card mt-3">
        <div class="card-header">
            <h1>Task List</h1>
        </div>
        <div class="card-body">
            <div class="row p-2">
                <div class="col text-end">
                    <a href="{{route('task.create')}}" class="btn btn-success btn-sm btn-block">Add New</a>
                </div>
            </div>
            <div class="row m-1 bg-light p-1">
                <div class="col-1">
                    Priority
                </div>
                <div class="col-7 text-start">
                    Task Name
                </div>
                <div class="col-2 text-start">
                    Created
                </div>
                <div class="col-2 text-center">
                    Action
                </div>
            </div>
            <div id="task-list">
                @foreach($tasks as $task)
                    <div class="row border m-1 p-1">
                        <div class="col-1">
                            #{{$task->priority}}
                        </div>
                        <div class="col-7 text-start">
                            {{$task->title}}
                        </div>
                        <div class="col-2 text-start">
                            {{$task->created_at}}
                        </div>
                        <div class="col-2 text-end">
                            <a href="{{route('task.edit',$task->id)}}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{route('task.destroy',$task->id)}}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#task-list').sortable();
        });
    </script>
@endsection








