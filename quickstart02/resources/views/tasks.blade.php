@extends('layouts.app')
@section('content')

<div class="container">
  <div class="col-sm-offset-2 col-sm-8">
    <div class="panel panel-default">
      <div class="panel-heading"> New Task </div>
      <div class="panel-body">
        
        <!-- Display Validation Errors -->
        @include('common.errors')
        
        <!-- New Task Form -->
        <form action="{{ url('task') }}" method="POST" class="form-horizontal"> {{ csrf_field() }}
          
        <!-- Task Name -->
        <div class="form-group">
          <label for="task-name" class="col-sm-3 control-label">Task</label>
          
          <div class="col-sm-6">
            <input type="text" name="name" id="task-name" class="form-control">
          </div>
        </div>
        
        <!-- Add Task Button -->
        
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default">
              <i class="fa fa-btn fa-plus">
                </i>Add Task</button>
              </div>
            </div>
          </form>
        </div>
      </div>
{{-- Top form end --}}

{{-- bottom form start --}}
      <!-- TODO: Current Tasks -->
      @if (count($tasks) > 0)
      <div class="panel panel-default">
        <div class="panel-heading">
          - Current task -
        </div>
    
        <div class="panel-body">
          <table class="table table-striped task-table">
            <!-- table header -->
            <thead>
              <th>Task list</th>
              <th>&nbsp;</th>
            </thead>
        </div>

            <!-- table body -->
            <tbody>
              @foreach ($tasks as $task) {{-- foreachで回す --}}
              <tr>

            <!-- Task name -->
                <td class="table-text">
                  <a href="{{route('detail',$task->id)}}">{{ $task->name }}
                </td> 

             <!-- Delete Button -->
             <td>   
               <td>
                 <td>
                    <form action = "{{ url('delete/'.$task->id) }}" method = "POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      
                      <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Delete
                      </button>

                    </form>
                  </td>
                </td>
               </td>

              </tr>{{-- ($tasks as $task) ここまでforeachで回す --}}
              @endforeach
            </tbody>
          </table>
        </div>
      </div> {{-- class="col-sm-offset-2 col-sm-8" --}}
      @endif
    </div> {{-- class="container" --}}

  {{-- </div> --}}
  @endsection