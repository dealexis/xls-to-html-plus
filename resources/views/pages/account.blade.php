@extends('default-page')

@section('content')
    <div class="container middle-content">
        @if($conversions->isNotEmpty())
            <h1>Conversions list</h1>
            <div class="conversions flex flex-wrap">
                @foreach($conversions as $conversion)
                    <div class="conversion p-5">
                        {{$conversion->type}} {{$conversion->created_at}}
                        @if($conversion['file'])
                            @php($file = \App\Resources\FileResource::make($conversion['file'])->toArray(request()))
                            <a href="{{ $file['url'] }}">{{ $file['filename'] }}</a>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <h1>Conversions list is empty</h1>
            <h3>Please make your first conversion</h3>
        @endif
    </div>
    @if (session('token'))
        <script>
            localStorage.setItem('auth_token', '{{session('token')}}');
        </script>
    @endif
@endsection

<style>
    .conversion {
        background: #eefff5;
        margin: 5px;
        border-radius: 4px;
    }
</style>
