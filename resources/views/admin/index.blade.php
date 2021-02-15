@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Index</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{--成功時のメッセージ--}}
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    {{-- エラーメッセージ --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div>
                    @endif
                    <button type="button" class="btn btn-primary" onclick="location.href='{{ route('admin.create') }}'">
                        {{ __('追加') }}
                    </button>
                    <div class="table-resopnsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{__('ID')}}</th>
                                    <th>{{__('admin_code')}}</th>
                                    <th>{{__('name')}}</th>
                                    <th>{{__('role')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($admins))  
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td><a href="/admin/{{ $admin->id }}">{{ $admin->id }}</a></td>
                                            <td>{{ $admin->admin_code }}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->role}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection