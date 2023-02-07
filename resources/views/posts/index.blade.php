@extends('layouts.login')

@section('content')

  <h2>機能を実装していきましょう。</h2>

  <!-- 新規投稿 -->
   {!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか...?']) !!}
        </div>
        <input type="image" src="/public/images/post.png">

        {!! Form::close() !!}


        <!-- 投稿内容の表示 -->
   @foreach ($posts as $post)
            <tr>
              <td>{{ $post->images }}</td>
              <td>{{ $post->username }}</td>
                <td>{{ $post->posts }}</td>
                <td>{{ $post->created_at }}</td>
            </tr>
            @endforeach

@endsection
