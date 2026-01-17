@extends('admin.layouts.master')

@section('main_content')

@include('admin.layouts.top')
@include('admin.layouts.sidebar')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Counter Items</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.counter.update') }}" method="post" >
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">Counter 1 - Number *</label>
                                            <input type="text" class="form-control" name="number1" value="{{ $counter_items->number1 }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Counter 1 - Title *</label>
                                            <input type="text" class="form-control" name="title1" value="{{ $counter_items->title1 }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Counter 1 - Text *</label>
                                            <textarea class="form-control h_100" name="text1" rows="3">{{ $counter_items->text1 }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">Counter 2 - Number *</label>
                                            <input type="text" class="form-control" name="number2" value="{{ $counter_items->number2 }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Counter 2 - Title *</label>
                                            <input type="text" class="form-control" name="title2" value="{{ $counter_items->title2 }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Counter 2 - Text *</label>
                                            <textarea class="form-control h_100" name="text2" rows="3">{{ $counter_items->text2 }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">Counter 3 - Number *</label>
                                            <input type="text" class="form-control" name="number3" value="{{ $counter_items->number3 }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Counter 3 - Title *</label>
                                            <input type="text" class="form-control" name="title3" value="{{ $counter_items->title3 }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Counter 3 - Text *</label>
                                            <textarea class="form-control h_100" name="text3" rows="3">{{ $counter_items->text3 }}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label class="form-label"></label>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection