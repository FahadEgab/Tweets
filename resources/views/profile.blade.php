@extends('layouts.master')

@section('contents')
    <div class="container" style="margin-top:2vh">
        <div class="row">
            <div class="col-12">
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
            </div>
            <div class="col-md-4">
                <div class="card">
                    <!--border-primary-->
                    <div class="card-header">
المعلومات الشخصية
                    </div>
                    <img class="rounded"  src="https://static.remove.bg/remove-bg-web/2e3a8aa57bcd08605c78f95f1c4bd007b07a5100/assets/start_remove-79a4598a05a77ca999df1dcb434160994b6fde2c3e9101984fb1be0f16d0a74e.png" style="margin-right: 28%"  height="150" width="150" alt="...">

                    <form method="post" action="{{route('User.update',(session()->get('Id')))}}">

                        <div class="modal-body">

                            @csrf
                            @method('PUT')

                            <div class="mb-3">

                                <label for="title" style="" class="form-label">صورة المستخدم:</label>
                                <input type="file" class="form-control" name="photo"
                                       id="formGroupExampleInput">
                                @error('photo')
                                <small class="form-text text-danger">
                                    {{$message}}
                                </small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">اسم المستخدم:</label>
                                <input type="text" value="{{$user->name}}" class="form-control" name="name"
                                       id="formGroupExampleInput">
                                @error('name')
                                <small class="form-text text-danger">
                                    {{$message}}
                                </small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">البريد الالكتروني:</label>
                                <input type="text" value="{{$user->email}}" class="form-control" name="email"
                                       id="formGroupExampleInput">
                                @error('email')
                                <small class="form-text text-danger">
                                    {{$message}}
                                </small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">كلمة المرور:</label>
                                <input type="password" value="" class="form-control" name="password" id="formGroupExampleInput">
                                @error('password')
                                <small class="form-text text-danger">
                                    {{$message}}
                                </small>
                                @enderror
                            </div>



                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">تعديل</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-8">

                <!--border-primary-->
                <form method="POST" action="{{route('Tweets.store')}}" style="height: 640px" class="card">
                    @csrf
                    <div class="card-header">
                        <label for="exampleFormControlTextarea1" class="form-label">إنشاء تغريدة</label>

                    </div>
                    <div class="mb-3" style="padding: 1%;">
                        <textarea name="content" value="{{old('content')}}" class="form-control" id="exampleFormControlTextarea1" rows="3">

                        </textarea>
                        @error('content')
                        <small class="form-text text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="d-flex me-auto" style="padding: 1%;">
                        <button href="#" type="submit" class="btn btn-outline-primary" style="float: left;">إرسال</button>

                    </div>
                </form>

            </div>

          @foreach($tweets as $tweet)
            <div class="col-md-4"></div>
            <div class="col-md-8" style="margin-top: 1vh">
                <div class="card">
                    <!--border-primary-->
                    <div class="card-header">
                        @if($tweet->user->photo ==null)
                            <img src="https://www.hayalanka.com/wp-content/uploads/2017/07/avtar-image.jpg" style="float: right;" class="avatar" height="40" width="40" alt="pic">
                        @else
                            <img src="{{$tweet->user->photo}}" style="float: right;" class="avatar" height="40" width="40" alt="pic">

                        @endif
                        <h5 style="margin-top: 1.5vh;font-weight: bold;">{{$tweet->user->name}}
                        </h5>
                    </div>

                    <p style="padding: 1%;">
                        {{$tweet->content}}
                    </p>
                 <form method="post" action="{{route('Tweets.destroy',($tweet->Id))}}" >
                    <div class="d-flex me-auto" style="padding: 1%;">
@csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-primary" style="float: left;">حذف التغريدة</button>
                    </div>
                 </form>
                </div>
            </div>
            @endforeach
        </div>


    </div>

@endsection
