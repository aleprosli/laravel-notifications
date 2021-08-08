@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @php
                        $notifications = auth()->user()->notifications;
                    @endphp
                   <table>
                      <tr>
                        <th>Noti</th>
                      </tr>
                      @foreach ($notifications as $noti)
                      <tr>
                          <td>
                            @include('notifications.'.Str::snake(class_basename($noti->type)))
                            {{-- <td>{{ $noti->type }}</td>   --}}
                          </td>
                      </tr>
                      @endforeach

                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
