<table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Platform</th>
        <th scope="col">Category</th>
        <th scope="col">Tags</th>
        <th scope="col">Create at</th>
        <th scope="col" colspan="3" class="text-center">Action</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($articles as $article)
      <tr>
        {{-- @dd($consoles) --}}
        <th scope="row">{{$article->id}}</th>
        <td>{{$article->title}}</td>
        <td>{{$article->consoles->name}}</td>
        <td>{{$article->category->name ?? "No category"}}</td>
        <td>
            @foreach ($article->tags as $tag)
                #{{$tag->name}}
            @endforeach
        </td>
        <td>{{$article->created_at->format('d/m/Y')}}</td>
        <td class="text-center">
            <a href="{{route('article.show', $article)}}" class="btn btn-secondary">Read article</a>
            <a href="{{route('article.edit', $article)}}" class="btn btn-secondary">Edit</a>
            <form action="{{route('revisor.acceptArticle', $article)}}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-success">Accept</button>
             </form>
            <form action="{{route('article.destroy', $article)}}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form> 
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>