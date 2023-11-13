@extends('layouts.admin')

@section('content')

<div class="container py-4">

        @include('admin.projects.partials.session_message')

        <h2 class="text-muted text-uppercase">Types table</h1>

        <div id="icons">
            <a class="btn btn-primary d-inline-flex align-items-center justify-items-center p-2" href="{{ route('admin.types.create') }}">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
        {{-- /#icons --}}

        <div class="pt-4"> {{$types->links('pagination::bootstrap-5')}} </div>

        <div class="table-responsive">
            <table class="table table-light table-hover table-striped table-bordered table align-middle">
                <thead>
                    <tr class="table-dark text-center">
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($types as $type)
    
                    <tr>
                        <td scope="row"> {{$type->id}} </td>
                        <td> {{$type->name}} </td>

                        <td class="text-center">
                             <div class="d-flex align-items-center justify-content-center gap-1">
                                <i class="fa-solid fa-calendar-days"></i>
                                {{$type->created_at->format('d-m-Y')}}
                            </div>
                             <div class="d-flex align-items-center justify-content-center gap-1">
                                <i class="fa-regular fa-clock"></i>
                                {{$type->created_at->format('H:i')}}
                            </div>
                        </td>
                        
                        <td>

                            <div class="d-flex gap-2">
                                {{-- <a href=" {{route('admin.types.show', $type->slug)}} " class="btn btn-outline-primary">
                                    <i class="fa-solid fa-eye"></i>
                                </a> 
                                <a href=" {{route('admin.types.edit', $type->slug)}} " class="btn btn-outline-success">
                                    <i class="fa-solid fa-file-pen"></i>
                                </a>  --}}
    
                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalId-{{$type->id}}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                                <!-- Modal is here 👇 -->
                               {{--  @include('admin.types.partials.modal_delete') --}}

                            </div>                            

                        </td>

                    </tr>
                        
                    @empty
                        No types yet
                    @endforelse

                </tbody>
            </table>
            <div class="pt-4"> {{$types->links('pagination::bootstrap-5')}} </div>
        </div>
</div>
    

@endsection