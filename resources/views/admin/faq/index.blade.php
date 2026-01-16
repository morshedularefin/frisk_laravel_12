@extends('admin.layouts.master')

@section('main_content')

@include('admin.layouts.top')

@include('admin.layouts.sidebar')

<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>FAQs</h1>
            <div class="ml-auto">
                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_add"><i class="fas fa-plus"></i> Add New</a>
            </div>
            <!-- Add Modal -->
            <div class="modal fade" id="modal_add" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Item</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.faq.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label for="">Question *</label>
                                        <input type="text" class="form-control" name="question">
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="">Answer *</label>
                                        <textarea class="form-control h_100" name="answer"></textarea>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="">Item Order</label>
                                        <input type="text" class="form-control" name="item_order">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="">FAQ Page?</label>
                                        <select name="faq_page" class="form-select">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="">Home Page 1</label>
                                        <select name="home_page_1" class="form-select">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="">Home Page 5</label>
                                        <select name="home_page_5" class="form-select">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // Add Modal -->
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
                                            <th>Question</th>
                                            <th>Order</th>
                                            <th>FAQ Page</th>
                                            <th>Home Page 1</th>
                                            <th>Home Page 5</th>
                                            <th class="w_100">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($faqs as $faq)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $faq->question }}</td>
                                            <td>{{ $faq->item_order }}</td>
                                            <td>
                                                @if($faq->faq_page == 'Yes')
                                                    <span class="badge bg-success">Yes</span>
                                                @else
                                                    <span class="badge bg-danger">No</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($faq->home_page_1 == 'Yes')
                                                    <span class="badge bg-success">Yes</span>
                                                @else
                                                    <span class="badge bg-danger">No</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($faq->home_page_5 == 'Yes')
                                                    <span class="badge bg-success">Yes</span>
                                                @else
                                                    <span class="badge bg-danger">No</span>
                                                @endif
                                            </td>
                                            <td class="pt_10 pb_10">
                                                <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal_edit_{{ $faq->id }}"><i class="fas fa-edit"></i></a>
                                                <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal_delete_{{ $faq->id }}"><i class="fas fa-trash"></i></a>
                                            </td>
                <div class="modal fade" id="modal_edit_{{ $faq->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.faq.update', $faq->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label for="">Question *</label>
                                        <input type="text" class="form-control" name="question" value="{{ $faq->question }}">
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="">Answer *</label>
                                        <textarea class="form-control h_100" name="answer">{{ $faq->answer }}</textarea>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="">Item Order</label>
                                        <input type="text" class="form-control" name="item_order" value="{{ $faq->item_order }}">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="">FAQ Page?</label>
                                        <select name="faq_page" class="form-select">
                                            <option value="Yes" {{ $faq->faq_page == 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ $faq->faq_page == 'No' ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="">Home Page 1</label>
                                        <select name="home_page_1" class="form-select">
                                            <option value="Yes" {{ $faq->home_page_1 == 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ $faq->home_page_1 == 'No' ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="">Home Page 5</label>
                                        <select name="home_page_5" class="form-select">
                                            <option value="Yes" {{ $faq->home_page_5 == 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ $faq->home_page_5 == 'No' ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal_delete_{{ $faq->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="post">
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