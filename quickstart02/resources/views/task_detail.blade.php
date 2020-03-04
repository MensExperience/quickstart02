@extends('layouts.app')
@section('content')

<div class="container">
  <div class="col-sm-offset-2 col-sm-8">
    <div class="panel panel-default">
{{-- タイトル名にリンク付ける --}}
      <div class="panel-heading">{{$task->name}}</div>
        <div class="panel-body">
          
          <!-- Display Validation Errors -->
          @include('common.errors')
          
          <!-- Task Comment  -->
          <form action="{{route('comment',$task->id)}}" method="POST" class="form-horizontal"> {{ csrf_field() }}
            
          <!-- Comment Name -->
          <div class="form-group">
            <label for="comment" class="col-sm-3 control-label">Comment</label>
            
            <div class="col-sm-6">
              <input type="text" name="body" id="comment" class="form-control">
            </div>
          </div>
          
         
          <!-- Add Comment Button --> 
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
              <button type="submit" class="btn btn-default"><i class="fa fa-btn fa-plus"></i>Add Comment
              </button>
            </div>
          </div>
         </form>
      </div>
    </div>
       
<!-- TODO: Current Tasks -->

<div class="panel panel-default">
        
      <div class="panel-heading">Task name:  <a href="{{ url('/tasks') }}">【{{$task->name}}】</a></div>

      <div class="panel-body">
        <table class="table table-striped task-table">
            
            <!-- テーブルヘッダ -->
            <thead>
              <th>Comment List</th>
              <th>&nbsp;</th>
            </thead>

            {{-- ちょっと移動した --}}
            @if (count($comments) > 0)

            <!-- テーブル本体 -->
      <tbody>
        @foreach ($comments as $comment)
        <tr>                
            <!-- コメント表示 -->
        <td class="table-text">
          <div>{{ $comment->body }}</div>
        </td> {{-- foreachで回す --}}

        <!-- Comment Delete Button -->
            <td><td> {{-- 謎のスペース用 --}}
            <td>
                <form action = "{{ url('comment/delete/'.$comment->id) }}" method = "POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger">
                <i class="fa fa-trash"></i>Delete</button>
              </form>
              {{-- アカン！ <form action = "{{ url('delete/'.$comment->id) }}" method = "POST"> --}}
              {{--さっきのエラーが何かって言うと、
          action = “{{ url(‘delete/’.$comment->id) }}”
          これで最終的に生成されるURLがdelete/{id}なので、これに対応するrouteがなかったからです--}}

            </td>
            </td></td>{{-- 謎のスペース用 --}}
          </tr>              
        @endforeach
        </tbody>
      </table>
      </div>

    </div> 
  @endif
  </div>
</div>
  @endsection