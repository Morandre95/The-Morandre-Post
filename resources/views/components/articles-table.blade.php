<table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">platform</th>
        <th scope="col">By</th>
        <th scope="col" colspan="3" class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($articles as $article)
      <tr>
        <th scope="row">{{$article->id}}</th>
        <td>{{$article->title}}</td>
        <td>{{ $article->consoles->name }}</td>
        <td>{{$article->user->name}}</td>
        <td>
           @if (is_null($article->is_accepted))
           <a href="{{route('article.show', $article)}}" class="btn btn-secondary">Read article</a>
           <td>
             <form action="{{route('revisor.acceptArticle', $article)}}" method="POST">
               @csrf
               <button type="submit" class="btn btn-success d-inline-block">Accept</button>
              </form>
            </td>
            <td>
              <form action="{{route('revisor.rejectArticle', $article)}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Reject</button>
              </form>
            </td>
           @else
              <form action="{{route('revisor.undoArticle', $article)}}" method="POST">
                @csrf
                  <button type="submit" class="btn btn-secondary">Redirect for review</button>
              </form>
           @if ((!$article->is_reject ))
              <td>
                <form action="{{route('revisor.rejectArticle', $article)}}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-danger">Reject</button>
                </form>
              </td>
           @endif
           @if ((!$article->is_accepted && !$article->is_reject))
           <td>
            <form action="{{route('revisor.acceptArticle', $article)}}" method="POST">
              @csrf
              <button type="submit" class="btn btn-success d-inline-block">Accept</button>
             </form>
           </td>
        @endif
           @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>