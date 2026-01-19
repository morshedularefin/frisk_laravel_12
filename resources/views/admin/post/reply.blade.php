@extends('admin.layouts.master')

@section('main_content')

@include('admin.layouts.top')

@include('admin.layouts.sidebar')

<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Replies</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Post</th>
                                            <th>Comment</th>
                                            <th>Name & Email</th>
                                            <th>Reply</th>
                                            <th>Reply By</th>
                                            <th>Status</th>
                                            <th class="w_50">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($replies as $reply)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $reply->post->title }}
                                                <br>
                                                <a href="{{ route('post', $reply->post->slug) }}" target="_blank">Visit Link</a>
                                            </td>
                                            <td>
                                                {{ $reply->comment->comment }}
                                                @if($reply->reply_by == 'User')
                                                <br>
                                                <a href="" data-bs-toggle="modal" data-bs-target="#modal_admin_reply_{{ $reply->id }}">Admin Reply</a>
                                                @endif

            <!-- Admin Reply Modal -->
            <div class="modal fade" id="modal_admin_reply_{{ $reply->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Give Reply</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.post.reply.admin_reply') }}" method="post">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $reply->post->id }}">
                                <input type="hidden" name="comment_id" value="{{ $reply->comment->id }}">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label for="">Reply</label>
                                        <textarea name="reply" class="form-control h_100" rows="5" required></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // Admin Reply Modal -->
                                            </td>
                                            <td>{{ $reply->name }}<br>{{ $reply->email }}</td>
                                            <td>{!! nl2br($reply->reply) !!}</td>
                                            <td>
                                                {{ $reply->reply_by }}
                                            </td>
                                            <td>
                                                @if($reply->status == 'Pending')
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif($reply->status == 'Approved')
                                                    <span class="badge bg-success">Approved</span>
                                                @endif
                                            </td>
                                            <td class="pt_10 pb_10">
                                                @if($reply->reply_by == 'User')
                                                <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal_change_status_{{ $reply->id }}"><i class="fas fa-check-circle"></i></a>
                                                @endif
                                                <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal_delete_{{ $reply->id }}"><i class="fas fa-trash"></i></a>
                                            </td>

                <div class="modal fade" id="modal_change_status_{{ $reply->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Change Status</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.post.reply.change', $reply->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                        <div class="col-lg-12 mb-3">
                                            <label for="">Select Status *</label>
                                            <select name="status" class="form-select">
                                                <option value="Pending">Pending</option>
                                                <option value="Approved">Approved</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal_delete_{{ $reply->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.post.reply.destroy', $reply->id) }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="">Do you want to delete this item?</label>
                                </div>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection