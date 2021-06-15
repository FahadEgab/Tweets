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
            <div class="col-md-3">
                <div class="card">
                    <!--border-primary-->
                    <div class="card-header">
                        أشخاص قد تعرفهم
                    </div>
                    <ul class="list-group list-group-flush" style="padding-left: 0;">
                        <li class="list-group-item" style="font-weight: bold;;">
                            <img src="Capture.PNG" style="float: right;" class="avatar" height="40" width="40" alt="...">
                            <h5 style="margin-top: 1.5vh;font-weight: bold;">فهد المطيري
                                <a href="{{route('User.show',1)}}" class="btn btn-outline-primary" style="float: left;">عرض</a>
                            </h5>

                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-md-6">

                <!--border-primary-->
                <form method="POST" action="{{route('Tweets.store')}}" class="card">
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

            <div class="col-md-3">
                <div class="card">
                    <!--border-primary-->
                    <div class="card-header">
                        هاشتاقات متداولة
                    </div>
                    <ul class="list-group list-group-flush" style="padding-left: 0;">
                        <li class="list-group-item"><a class="navbar-brand text-primary" href="#">#تويتز</a></li>
                    </ul>
                </div>
            </div>

            {{--Section database--}}
@foreach($tweets as $tweet)
            <div class="col-md-3"></div>

            <div class="col-md-6" style="margin-top: 2vh;">
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
                    <div class="d-flex me-auto" style="padding: 1%;">
                        <a href="#" class="btn btn-outline-primary" style="float: left;">عرض التغريدة</a>
                    </div>

                </div>
            </div>

            <div class="col-md-3"></div>
            @endforeach
        </div>

        @if(session()->exists('Id')==false)
            <div class="row">
                <div class="col-12">

                    <!-- Modal -->
                    <div class="modal fade" id="signUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title display-6 text-center" id="exampleModalLabel">تسجيل حساب جديد</h5>
                                    <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                                        <i aria-hidden="true" class="fas fa-times"></i>
                                    </button>
                                </div>
                                <form method="post" action="{{route('User.store')}}">
                                    <div class="modal-body">

                                        @csrf
                                        <div class="mb-3">
                                            <label for="title" class="form-label">اسم المستخدم:</label>
                                            <input type="text" value="{{old('name')}}" class="form-control" name="name"
                                                   id="formGroupExampleInput">
                                            @error('name')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="title" class="form-label">البريد الالكتروني:</label>
                                            <input type="text" value="{{old('email')}}" class="form-control" name="email"
                                                   id="formGroupExampleInput">
                                            @error('email')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="content" class="form-label">كلمة المرور:</label>
                                            <input type="password" class="form-control" name="password" id="formGroupExampleInput">
                                            @error('password')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                                            @enderror
                                        </div>



                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                        <button type="submit" class="btn btn-primary">تسجيل</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-12">

                    <div class="modal fade" id="signIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title display-6 text-center" id="exampleModalLabel">تسجيل الدخول</h5>
                                    <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                                        <i aria-hidden="true" class="fas fa-times"></i>
                                    </button>
                                </div>
                                <form method="post" action="{{route('User.signIn')}}">
                                    <div class="modal-body">

                                        @csrf
                                        <div class="mb-3">
                                            <label for="title" class="form-label">البريد الالكتروني:</label>
                                            <input type="text" class="form-control" name="email" id="formGroupExampleInput">
                                            @error('email')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="content" class="form-label">كلمة المرور:</label>
                                            <input type="password" class="form-control" name="password" id="formGroupExampleInput">
                                            @error('password')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                                            @enderror
                                        </div>
                                        @if(Session::has('success'))
                                            <div class="alert alert-danger" role="alert">
                                                {{Session::get('msg')}}
                                            </div>
                                        @endif



                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                        <button type="submit" class="btn btn-primary">تسجيل الدخول</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>


@endsection
