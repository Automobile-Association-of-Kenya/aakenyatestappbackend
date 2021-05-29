@extends('layouts.main')
@section('title')
    <title>Edit Question</title>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Edit Question</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i> AAK</a></li>
                        <li class="breadcrumb-item"><a href="{{route('tests.edit',$question->test->id)}}">{{$question->test->title}}</a></li>
                        <li class="breadcrumb-item active">Edit Question</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Edit</strong> Question</h2>
                        </div>
                        <div class="body">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{session('error')}}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        {{$error}} <br>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{route('questions.update',$question->id)}}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                @method('patch')
                                <label for="">Question</label>
                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="Title" name="question" value="{{$question->question}}">
                                </div>
                                <div class="form-group form-float">
                                    <label for="topic">Topic</label> 
                                    <span><select class="form-control show-tick ms select2" data-placeholder="Select" name="topic_id">
                                        <option {{$question->topic_id==0?'selected':''}} value="0">General</option>
                                        @foreach ($topics as $item)
                                            <option {{$question->topic_id!=0 && $item->id==$question->topic->id?'selected':''}} value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                    </span>
                                </div>
                                <div class="form-group form-float">
                                    <label for="type">Type</label> 
                                    <span><select class="form-control show-tick ms select2" data-placeholder="Select" name="type" onchange="change_type()" id="select" >
                                        <option  value="0">Select </option>
                                        <option {{$question->type=='single'?'selected':''}} value="1">Single-Choice</option>
                                        <option {{$question->type=='multi'?'selected':''}} value="2">Multi-Choice</option>
                                        <option {{$question->type=='true_false'?'selected':''}} value="3">True/False</option>
                                        <option {{$question->type=='essay'?'selected':''}} value="4">Essay</option>
                                    </select>
                                    </span>
                                </div>
                                <div id="single" style="{{$question->type!='single'?'display: none;':''}}">
                                    <h2 class="card-inside-title">Single Choices</h2>
                                    <div class="row clearfix">
                                        <div class="col-sm-10">
                                            <div class="form-group">                                    
                                                <input type="text" class="form-control" placeholder="First Choice" name="single_first" value="{{$question->first_choice}}" />                                   
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="radio inlineblock m-r-20">
                                                <input type="radio" name="single" id="first" class="with-gap" value="first" {{$question->first_answer==true?'checked':''}}>
                                                <label for="first">Correct</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="form-group">                                   
                                                <input type="text" class="form-control" placeholder="Second Choice" name="single_second" value="{{$question->second_choice}}" />                                    
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="radio inlineblock m-r-20">
                                                <input type="radio" name="single" id="second" class="with-gap" value="second"  {{$question->second_answer==true?'checked':''}}>
                                                <label for="second">Correct</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-10">
                                            <div class="form-group">                                    
                                                <input type="text" class="form-control" placeholder="Third Choice" name="single_third" value="{{$question->third_choice}}" />                                   
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="radio inlineblock m-r-20">
                                                <input type="radio" name="single" id="third" class="with-gap" value="third" {{$question->third_answer==true?'checked':''}}>
                                                <label for="third">Correct</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="form-group">                                   
                                                <input type="text" class="form-control" placeholder="Fourth Choice" name="single_fourth" value="{{$question->fourth_choice}}" />                                    
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="radio inlineblock m-r-20">
                                                <input type="radio" name="single" id="fourth" class="with-gap" value="fourth" {{$question->fourth_answer==true?'checked':''}}>
                                                <label for="fourth">Correct</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="multi" style="{{$question->type!='multi'?'display: none;':''}}">
                                    <h2 class="card-inside-title">Multiple Choices</h2>
                                    <div class="row clearfix">
                                        <div class="col-sm-10">
                                            <div class="form-group">                                    
                                                <input type="text" class="form-control" placeholder="First Choice" name="multi_first" value="{{$question->first_choice}}" />                                 
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="checkbox">
                                                <input id="first_choice" type="checkbox" name="multi[]" value="first" {{$question->first_answer==true?'checked':''}}>
                                                <label for="first_choice">
                                                        Correct
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="form-group">                                   
                                                <input type="text" class="form-control" placeholder="Second Choice" name="multi_second" value="{{$question->second_choice}}"/>                                    
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="checkbox">
                                                <input id="second_choice" type="checkbox" name="multi[]" value="second" {{$question->second_answer==true?'checked':''}}>
                                                <label for="second_choice">
                                                        Correct
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-10">
                                            <div class="form-group">                                    
                                                <input type="text" class="form-control" placeholder="Third Choice" name="multi_third" value="{{$question->third_choice}}"/>  
                                              
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="checkbox">
                                                <input id="third_choice" type="checkbox" name="multi[]" value="third" {{$question->third_answer==true?'checked':''}}>
                                                <label for="third_choice">
                                                        Correct
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="form-group">                                   
                                                <input type="text" class="form-control" placeholder="Fourth Choice" name="multi_fourth" value="{{$question->fourth_choice}}"/>                                    
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="checkbox">
                                                <input id="fourth_choice" type="checkbox" name="multi[]" value="fourth" {{$question->fourth_answer==true?'checked':''}}>
                                                <label for="fourth_choice">
                                                        Correct
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="true_false" style="{{$question->type!='true_false'?'display: none;':''}}">
                                    <h2 class="card-inside-title">True or False Choices</h2>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group text-center"> 
                                                <label for="">1. True</label>                                   
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="radio inlineblock m-r-20">
                                                <input type="radio" name="true_false" id="true" class="with-gap" value="true" {{$question->first_answer==true?'checked':''}}>
                                                <label for="true">Correct</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group text-center">                                   
                                                <label for="">2. False</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="radio inlineblock m-r-20">
                                                <input type="radio" name="true_false" id="false" class="with-gap" value="false" {{$question->second_answer==true?'checked':''}}>
                                                <label for="false">Correct</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="card">
                                        <div class="header">
                                            <h2>Upload Image</h2>
                                        </div>
                                        <div class="body">
                                            <input type="file" class="dropify" name="image"  data-default-file="{{asset('Images/'.$question->photo)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <input type="number" value="{{$question->marks}}" class="form-control" placeholder="Marks" name="marks" >
                                </div>
                                <button class="btn btn-primary" type="submit" >Update</button>
                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<script>
    function change_type(){
        
        var type=$("#select").val();
            $("#single").hide();
            $("#multi").hide();
            $("#true_false").hide();
        if(type==1)
        {
            $("#single").show();
            $("#multi").hide();
            $("#true_false").hide();
        }
        else if(type==2)
        {
            $("#multi").show();
            $("#single").hide();
            $("#true_false").hide();
        }
        else if(type==3)
        {
            $("#true_false").show();
            $("#multi").hide();
            $("#single").hide();
        }
        else if(type==0||type==4)
        {
            $("#single").hide();
            $("#multi").hide();
            $("#true_false").hide();
        }
    }
    
</script>