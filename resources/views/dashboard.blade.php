<!DOCTYPE html>
<html lang="EN">


@extends('layout.layou')
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('shared.left_side_Bar')
            </div>
            <div class="col-6">
                @include('shared.error_message')
                @include('shared.succsess')
                @include('shared.submit_idea')
                <hr>
                <div class="mt-3">

                    @foreach ($ideas as $idea)
                        @include('shared.idea_card')
                    @endforeach
                    <div class="mt-3">
                        {{ $ideas->withQueryString()->links() }}
                    </div>
                </div>
            </div>
            <div class="col-3">
                @include('shared.search_bar')
                @include('shared.follow_box')
            </div>
        </div>
    </div>

    </body>

    </html>
@endsection
