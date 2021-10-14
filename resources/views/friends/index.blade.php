@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">created_at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($friends as $friend)
                        <tr>
                            <th scope="row">{{ $friend->id }}</th>
                            <td>{{ $friend->message ?? '' }}</td>
                            <td>{{ $friend->created_time }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
