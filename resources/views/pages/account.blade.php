@extends('default-page')

@section('content')
    <div class="container middle-content">
        @if($conversions->isNotEmpty())
            <h1>Conversions list</h1>
            <div class="conversions">
                @foreach($conversions as $conversion)
                    <div class="conversion">
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
    @dump($errors)
    @if ($errors->has('token'))
        token
        <script>
            localStorage.setItem('auth_token', '{{$errors->first('token')}}');
        </script>
    @endif
@endsection
