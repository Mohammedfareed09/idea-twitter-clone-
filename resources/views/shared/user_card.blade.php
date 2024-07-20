<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" method="POST" action="{{route('users.update',$user->id)}}">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                        src="{{$user->getImageURL()}}" alt="Mario Avatar">
                    <div>
                        @if ($editing ?? false)
                            <input name="name" value="{{ $user->name}}" type="text" class="form-control">
                            @error('name')
                                <span class="text-danger fs-6">{{ $message }}</span>
                            @enderror
                        @else
                            <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                                </a></h3>
                            <span class="fs-6 text-muted">{{ $user->email }}</span>
                        @endif
                    </div>
                </div>
                @auth()
                    @if (Auth::id() === $user->id)
                        <div>
                            <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                        </div>
                    @endif
                @endauth
            </div>
            <div class="px-2 mt-4">
                @if ($editing ?? false)
                    <div class ='mt-4'>
                        <label for="">Profile picture</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <span class="text-danger fs-6">{{ $message }}</span>
                        @enderror
                    </div>
                @endif

                <h5 class="fs-5 mt-4"> Bio : </h5>
                @if ($editing ?? false)
                    <div class="mb-3">
                        <textarea name = "bio" class="form-control" id="bio" rows="3">{{$user->bio}}</textarea>
                        @error('bio')
                            <span class = "d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>


                    <button class="btn btn-dark btn-sm mb-3">Save</button>
                @else
                    <p class="fs-6 fw-light">
                        {{$user->bio}}
                    </p>
                @endif
                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                        </span> 0 Followers </a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                        </span> {{ $user->ideas()->count() }} </a>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                        </span> {{ $user->comments()->count() }} </a>
                </div>
                @auth()
                    @if (Auth::id() !== $user->id)
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm"> Follow </button>
                        </div>
                    @endif
                @endauth
            </div>
        </form>
    </div>
</div>
