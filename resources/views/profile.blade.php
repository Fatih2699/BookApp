<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ProfilePage</title>
</head>
<style>
    body {
        margin: 0;
        padding-top: 40px;
        color: #2e323c;
        background: #f5f6fa;
        position: relative;
        height: 100%;
    }

    .account-settings .user-profile {
        margin: 0 0 1rem 0;
        padding-bottom: 1rem;
        text-align: center;
    }

    .account-settings .user-profile .user-avatar {
        margin: 0 0 1rem 0;
    }

    .account-settings .user-profile .user-avatar img {
        width: 90px;
        height: 90px;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
        border-radius: 100px;
    }

    .account-settings .user-profile h5.user-name {
        margin: 0 0 0.5rem 0;
    }

    .account-settings .user-profile h6.user-email {
        margin: 0;
        font-size: 0.8rem;
        font-weight: 400;
        color: #9fa8b9;
    }

    .account-settings .about {
        margin: 2rem 0 0 0;
        text-align: center;
    }

    .account-settings .about h5 {
        margin: 0 0 15px 0;
        color: #007ae1;
    }

    .account-settings .about p {
        font-size: 0.825rem;
    }

    .form-control {
        border: 1px solid #cfd1d8;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        font-size: .825rem;
        background: #ffffff;
        color: #2e323c;
    }

    .card {
        background: #ffffff;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        border: 0;
        margin-bottom: 1rem;
    }

    .preview-img {
        border-radius: 100%;
        box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.7);
    }

</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

<body>
    <div class="container">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <form action="{{ route('updateUser') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if (\Session::has('error'))
                                        <div id="error" class="alert alert-danger">
                                            {!! \Session::get('error') !!}
                                        </div>
                                    @endif
                                    <div class="user-avatar">
                                        <div class="preview text-center">
                                            <img class="preview-img" src=" {{ auth()->user()->photo_url }} "
                                                width="200" height="200" />
                                            <div class="browse-button" style="overflow: hidden">
                                                <input class="browse-input" type="file" name="profile_img"
                                                    id="UploadedFile" />
                                            </div>
                                            <span class="Error"></span>
                                        </div>
                                    </div>
                                    <h5 class="user-name">{{ auth()->user()->name }}</h5>
                                    <h6 class="user-email">{{ auth()->user()->email }}</h6>
                            </div>
                            <div class="about">
                                <h5>Hakkında</h5>
                                <p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human
                                    experiences.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary">Personal Details</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ auth()->user()->name }}">
                                    <span class="Error"></span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="col-sm-9 text-secondary">
                                        {{ auth()->user()->email }}
                                    </div>
                                    <span class="Error"></span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <div class="primary-btn">
                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Kaydet" />
                                    </div>
                                    <br>
                                    <br>
                                    <div class="primary-btn">
                                        <a class="btn btn-danger btn-lg btn-block"
                                            href="{{ route('booklist') }}">Vazgeç</a>
                                    </div>
                                    <br>
                                    <br>
                                    </form>
                                </div>
                                <form action="{{route('logout')}}" method = "POST">
                                    @csrf
                                    <div class="primary-btn" style="position: fixed">
                                        <button class="btn btn-secondary" style="background: #d11e1e"
                                        type="submit">Çıkış Yap</button>
                                    </div>
                                    </form>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
