<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{$idea->user->getImageURL()}}" alt="{{$idea->user->name}}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{route('users.show',$idea->user->id)}}"> {{$idea->user->name}}</a></h5>
                </div>
            </div>
            <div class="d-flex">
                <form method="POST" action="{{ route('idea.delete', $idea->id) }}">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm me-2">X</button>
                </form>
                {{-- <a href = "{{route('idea.show', $idea->id)}}"> View</a> --}}
                <form action="{{ route('idea.show', $idea->id) }}">
                    <button class=" btn btn-info btn-sm">show</button>
                </form>

                <form action="{{ route('idea.edit', $idea->id) }}">
                    <button class="mx-2 btn btn-success btn-sm me-2">Edit</button>
                </form>

            </div>

        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('idea.update', $idea->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name = "content" class="form-control" id="content" rows="3">{{ $idea->content }}</textarea>
                    @error('content')
                        <span class = "d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <button class="btn btn-dark"> Update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $idea->likes }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at }} </span>
            </div>
        </div>
        @include('shared.comments_box')

    </div>
</div>
