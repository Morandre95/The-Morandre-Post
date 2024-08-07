<table class="table">
  <thead class="table-dark">
    <tr>
      <th scope="col">{{__('ui.Id')}}</th>
      <th scope="col">{{__('ui.Tag name')}}</th>
      <th scope="col">{{__('ui.Q.ty of linked items')}}</th>
      <th scope="col">{{__('ui.Refresh')}}</th>
      <th scope="col">{{__('ui.Delete')}}</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($metaInfos as $metaInfo)
    <tr>
      <th scope="row">{{$metaInfo->id}}</th>
      <td>{{$metaInfo->name}}</td>
      <td>{{count($metaInfo->articles)}}</td>
{{-- TAG --}}
      @if ($metaType == 'tag')
      <td>
          <form action="{{route('admin.editTag', ['tag' => $metaInfo])}}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="name" placeholder="{{__('ui.New tag name')}}" class="form-control input-md-w d-inline">
            <button type="submit" class="btn btn-secondary mt-2 mt-md-0">{{__('ui.Refresh')}}</button>
          </form>
      </td>
      <td>
        <form action="{{route('admin.deleteTag', ['tag' => $metaInfo])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-5 mt-md-0">{{__('ui.Delete')}}</button>
          </form>
        </td>
      @endif
{{-- CATEGORY --}}
      @if($metaType == 'category')
      <td>
        <form action="{{route('admin.editCategory', ['category' => $metaInfo])}}" method="POST">
          @csrf
          @method('PUT')
          <input type="text" value="{{$metaInfo->name}}" name="name" placeholder="{{__('ui.New category name')}}" class="form-control input-md-w d-inline">
          <button type="submit" class="btn btn-secondary mt-2 mt-md-0">{{__('ui.Refresh')}}</button>
        </form>
     </td>
     <td>
      <form action="{{route('admin.deleteCategory', ['category' => $metaInfo])}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger mt-5 mt-md-0">{{__('ui.Delete')}}</button>
      </form>
     </td>
      @endif
    </tr>
    @endforeach 
  </tbody>
</table>
