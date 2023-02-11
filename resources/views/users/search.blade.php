@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/search']) !!}
  {!! Form::input('text', 'search', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
  <input type="image" src="/images/post.png">
{!! Form::close() !!}

      <table>
   @foreach ($users as $user)
            <tr>
              <td><img src="images/{{ $user->images }}"></td>
              <td>{{ $user->username }}</td>
              <td><a href="">フォロー</a></td>
              <td><a href="">フォローを外す</a></td>
            </tr>
            @endforeach
</table>
@endsection
