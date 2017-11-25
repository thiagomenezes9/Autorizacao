@extends(layout())

@section('content')


    <table class="table table-hover">

        <thead>
        <tr>
            <th>Post</th>
            <th>Ações</th>
        </tr>
        </thead>


        <tbody>

        @foreach($posts as $post)

        <tr>
            <td><b>{{$post->title}}</b><br>{{$post->content}}</td>
            <td>
                @if(\Illuminate\Support\Facades\Auth::user() === $post->user->id)
                <a href="#" class="btn btn-default">Editar</a>
                    @endif
            </td>
        </tr>

        @endforeach
        </tbody>

    </table>


@endsection


