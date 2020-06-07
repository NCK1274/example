@extends('layouts.app')
@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">お問い合わせ</div>
                <div class="panel-body">
                    <p>誤りがないことを確認のうえ送信ボタンをクリックしてください。</p>
 
                    <table class="table">
                        <tr>
                            <th>お問い合わせ種類</th>
                            <td>{{ $type }}</td>
                        </tr>
                        <tr>
                            <th>お名前</th>
                            <td>{{ $task->name }}</td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td>{{ $task->email }}</td>
                        </tr>
                        <tr>
                            <th>性別</th>
                            <td>{{ $task->gender }}</td>
                        </tr>
                        <tr>
                            <th>内容</th>
                            <td>{{ $task->body }}</td>
                        </tr>
                    </table>
 
                    {!! Form::open(['url' => 'task/complete',
                                    'class' => 'form-horizontal',
                                    'id' => 'post-input']) !!}
 
                    @foreach($task->getAttributes() as $key => $value)
                        @if(isset($value))
                            @if(is_array($value))
                                @foreach($value as $subValue)
                                    <input name="{{ $key }}[]" type="hidden" value="{{ $subValue }}">
                                @endforeach
                            @else
                                {!! Form::hidden($key, $value) !!}
                            @endif
 
                        @endif
                    @endforeach
 
                    {!! Form::submit('戻る', ['name' => 'action', 'class' => 'btn']) !!}
                    {!! Form::submit('送信', ['name' => 'action', 'class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection