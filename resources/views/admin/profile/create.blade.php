{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')




{{-- profile.blade.phpの@yield('title')に'プロフィール'を埋め込む --}}
@section('title', 'プロフィールの登録')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Myプロフィール</h2>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-md-2" for="name">名前</label>
                        <div class"col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name')}}">
                        </div>
                    </div>
                    <div class="form-groupe row">
                        <label class="col-md-2" for="gender">性別</label>
                        <div class"col-md-10">
                            <input type="text" class="form-control" name="gender" value="{{ old('gender')}}">
                        </div>
                    </div>
                    <div class="form-groupe row">
                        <label class="col-md-2" for="hobby">趣味</label>
                        <div class"col-md-10">
                            <input type="text" class="form-control" name="hobby" value="{{ old('hobby')}}">
                        </div>
                    </div>
                    <div class="form-groupe row">
                        <label class="col-md-2" for="introduction">自己紹介</label>
                        <div class"col-md-10">
                            <textarea class="form-control" name="introduction" rows="10">{{ old('introduction}}</textarea>
                        </div>
                    </div>
                     {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection
