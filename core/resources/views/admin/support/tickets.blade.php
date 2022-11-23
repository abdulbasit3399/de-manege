@extends('admin.layouts.app')

@section('panel')
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="table-responsive table-responsive-xl">
                <table class="table align-items-center table-light">
                    <thead>
                        <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">Submitted By</th>
                            <th scope="col">Status</th>
                            <th scope="col">Last Reply</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @forelse($items as $item)
                        <tr>
                            <td data-label="Subject">
                                <a href="{{ route('admin.ticket.view', $item->id) }}" class="font-weight-bold"> [Ticket#{{ $item->ticket }}] {{ $item->subject }} </a>
                            </td>

                            <td data-label="Submitted By">
                                @if($item->user_id != null)
                                <a href="{{ route('admin.users.detail', $item->user_id)}}"> {{$item->name}}</a>
                                @else
                                <p class="font-weight-bold"> {{$item->name}}</p>
                                @endif
                            </td>

                                                        
                            <td data-label="Status">
                                @if($item->status == 0)
                                    <span class="badge badge-success py-2 px-3">Open</span>
                                @elseif($item->status == 1)
                                    <span class="badge badge-primary py-2 px-3">Answered</span>
                                @elseif($item->status == 2)
                                    <span class="badge badge-warning py-2 px-3">Customer Reply</span>
                                @elseif($item->status == 3)
                                    <span class="badge badge-dark py-2 px-3">Closed</span>
                                @endif
                            </td>
                            <td data-label="Last Reply">{{ \Carbon\Carbon::parse($item->last_reply)->diffForHumans() }}</td>

                            <td data-label="Action">
                                <a href="{{ route('admin.ticket.view', $item->id) }}" class="btn btn-primary"><i
                                        class="fa fa-desktop"></i></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer py-4">
                <nav aria-label="...">
                    {{ $items->appends($_GET)->links() }}
                </nav>
            </div>
            
        </div>
    </div>
</div>
@endsection

@push('breadcrumb-plugins')

@endpush
