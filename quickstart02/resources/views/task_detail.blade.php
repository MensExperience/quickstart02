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
      @if (count($comments) > 0)
      <div class="panel panel-default">
        <div class="panel-heading">
          Comments list
        </div>
    
        <div class="panel-body">
          <table class="table table-striped task-table">
            
            <!-- テーブルヘッダ -->
            <thead>
              <th>Comment List</th>
              <th>&nbsp;</th>
            </thead>

            <!-- テーブル本体 -->
            <tbody>
              @foreach ($comments as $comment)
              
              <tr>
                <!-- コメント表示 -->
                <td class="table-text">
                  <div>{{ $comment->body }}</div>
                </td> {{-- foreachで回す --}}
              </tr>

              {{-- コメント削除ボタン --}}
            <td>
              <form action = "{{ url('delete/'.$commnet->id) }}" method = "POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    
                    <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i>Delete</button>
                  </form>
             </td>

              @endforeach
            </tbody>
          </table>
        </div>

      </div> 
      @endif
  </div>
</div>
  @endsection