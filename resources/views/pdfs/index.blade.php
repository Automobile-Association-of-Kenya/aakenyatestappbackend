@extends('layouts.main')
@section('title')
    <title>PDFs</title>
@endsection
@section('content')
<section class="content file_manager">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>PDF References</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                        <li class="breadcrumb-item active">PDFs </li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a href="{{route('pdfs.create')}}" class="btn btn-success btn-icon float-right" type="button"><i class="zmdi zmdi-upload"></i></a>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <div class="row clearfix">
                                    @forelse ($pdfs as $item)
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="file">
                                                    <div class="align-right">
                                                        <a href="{{route('pdfs.edit',$item->id)}}" class="btn btn-icon btn-icon-mini btn-round btn-primary">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <form id="form" action="{{route('pdfs.destroy',$item->id)}}" method="post" style="display: inline">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                        <button form="form" type="submit" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>

                                                    </div>
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-collection-pdf"></i>
                                                    </div>
                                                    <div class="file-name">
                                                        <p class="m-b-5 text-muted">{{$item->title}}</p>
                                                        <small>Topic: <span class="text-muted">{{$item->topic->title}}</span></small>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        <p>No PDFs to display</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
