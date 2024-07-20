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

                <div class="mt-3">
                    @include('shared.idea_card')
                    <div class="mt-3">
                    </div>
                    <div>
                        <form action="{{ route('dashboard', $idea->id) }}">
                            <button class = "btn btn-info btn-sm">Back to the main page</button>
                        </form>

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
