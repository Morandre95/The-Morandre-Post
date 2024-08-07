<table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">{{__('ui.Id')}}</th>
        <th scope="col">{{__('ui.Name')}}</th>
        <th scope="col">{{__('ui.E-Mail')}}</th>
        <th scope="col" class="text-center">{{__('ui.Action')}}</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($roleRequest as $user)
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
            @switch($role)
                @case('admin')
                <div class="d-flex justify-content-center">
                      <form action="{{route('admin.setAdmin', $user)}}" method="POST">
                          @csrf
                          @method('PATCH')
                          <button class="btn btn-secondary">{{__('ui.Active')}} {{$user->name}}</button>
                        </form>
                        <form action="{{route('admin.rejectAdmin', $user)}}" method="POST" class="mx-3">
                          @csrf
                          @method('PATCH')
                          <button class="btn btn-danger">{{__('ui.Reject')}} {{$user->name}}</button>
                      </form>
                    </div>
                    @break
                @case('revisor')
                <div class="d-flex justify-content-center">
                      <form action="{{route('admin.setRevisor', $user)}}" method="POST">
                          @csrf
                          @method('PATCH')
                          <button class="btn btn-secondary">{{__('ui.Active')}} {{$user->name}}</button>
                      </form>
                      <form action="{{route('admin.rejectAdmin', $user)}}" method="POST" class="mx-3">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-danger">{{__('ui.Reject')}} {{$user->name}}</button>
                    </form>
                    </div>
                    @break
                @case('writer')
                <div class="d-flex justify-content-center">
                <form action="{{route('admin.setWriter', $user)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-secondary">{{__('ui.Active')}} {{$user->name}}</button>
                </form>
                <form action="{{route('admin.rejectAdmin', $user)}}" method="POST" class="mx-3">
                  @csrf
                  @method('PATCH')
                  <button class="btn btn-danger">{{__('ui.Reject')}} {{$user->name}}</button>
              </form>
            </div>
                    @break
            @endswitch
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>