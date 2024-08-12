<table class="table">
    <thead class="table-dark">
        <tr>
            <th scope="col">{{__('ui.Id')}}</th>
            <th scope="col">{{__('ui.Title')}}</th>
            <th scope="col">{{__('ui.Platform')}}</th>
            <th scope="col">{{__('ui.By')}}</th>
            <th scope="col" class="text-center">{{__('ui.Action')}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
        <tr>
            <th scope="row">{{$article->id}}</th>
            <td>{{$article->title}}</td>
            <td>{{ $article->consoles->name }}</td>
            <td>{{$article->user->name}}</td>
            <td class="d-flex justify-content-center">
                @if (is_null($article->is_accepted))
                    <a href="{{route('article.show', $article)}}" class="btn btn-secondary m-0">{{__('ui.Read article')}}</a>
                    <form action="{{route('revisor.acceptArticle', $article)}}" method="POST" class="mx-1">
                        @csrf
                        <button type="submit" class="btn btn-success mx-2">{{__('ui.Accept')}}</button>
                    </form>
                    <form action="{{route('revisor.rejectArticle', $article)}}" method="POST" class="mx-1">
                        @csrf
                        <button type="submit" class="btn btn-danger">{{__('ui.Reject')}}</button>
                    </form>
                @else
                    <form action="{{route('revisor.undoArticle', $article)}}" method="POST" class="mx-1">
                        @csrf
                        <button type="submit" class="btn btn-secondary">{{__('ui.Redirect for review')}}</button>
                    </form>
                    @if ($article->is_accepted)
                        <form action="{{route('revisor.rejectArticle', $article)}}" method="POST" class="mx-1">
                            @csrf
                            <button type="submit" class="btn btn-danger mx-2">{{__('ui.Reject')}}</button>
                        </form>
                    @else
                        <form action="{{route('revisor.acceptArticle', $article)}}" method="POST" class="mx-1">
                            @csrf
                            <button type="submit" class="btn btn-success mx-2">{{__('ui.Accept')}}</button>
                        </form>
                    @endif
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  