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
                        أشخاص قد تعرفهم
                    </div>
                    <ul class="list-group list-group-flush" style="padding-left: 0;">
                        <li class="list-group-item" style="font-weight: bold;;">
                            <img src="Capture.PNG" style="float: right;" class="avatar" height="40" width="40" alt="...">
                            <h5 style="margin-top: 1.5vh;font-weight: bold;">فهد المطيري
                                <a href="#" class="btn btn-outline-primary" style="float: left;">عرض</a>
                            </h5>

                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-md-8">

                <!--border-primary-->
                <form method="POST" class="card">
                    <div class="card-header">
                        <label for="exampleFormControlTextarea1" class="form-label">إنشاء تغريدة</label>

                    </div>
                    <div class="mb-3" style="padding: 1%;">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <small class="form-text text-danger">
                            عدد الاحرف اقل من 200
                        </small>
                    </div>
                    <div class="d-flex me-auto" style="padding: 1%;">
                        <button href="#" type="submit" class="btn btn-outline-primary" style="float: left;">إرسال</button>

                    </div>
                </form>

            </div>



        </div>


    </div>

@endsection
