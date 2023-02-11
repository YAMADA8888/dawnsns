@extends('layouts.login')

@section('content')

  <h2>機能を実装していきましょう。</h2>

  <!-- 新規投稿 -->
{!! Form::open(['url' => 'post/create']) !!}
  {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか...?']) !!}
  <input type="image" src="/images/post.png">
{!! Form::close() !!}


        <!-- 投稿内容の表示 -->
        <table>
   @foreach ($posts as $post)
            <tr>
              <td><img src="images/{{ $post->images }}"></td>
              <td>{{ $post->username }}</td>
                <td>{{ $post->posts }}</td>
                <td>{{ $post->created_at }}</td>
                <td>
                  <img src="/images/edit.png" alt="" class="modalopen" data-target="{{ $post->id }}">
                </td>
                <td>
                  <div class="postListDeleteImage">
                    <a class="postDelete" href="{{ $post->id }}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
                      <img src="images/trash.png">
                    </a>
                  </div>
                </td>
            </tr>
            <div class="updateForm" id="{{ $post->id }}">
              {!! Form::open(['url' => 'post/update']) !!}
                {!! Form::input('text', 'upPost',$post->posts , ['required', 'class' => 'form-control']) !!}
                {!! Form::input('hidden', 'id',$post->id , ['required', 'class' => 'form-control']) !!}
                <input type="image" src="/images/edit.png">
              {!! Form::close() !!}
            </div>
            <br>
            @endforeach
</table>
@endsection
