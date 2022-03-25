<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <title>BookList</title>
    <style>
        .event-schedule-area-two .tab-content .table thead {
            background-color: #d11e1e;
            color: #fff;
            font-size: 18px;
            height: 100px;
            
        }
        .event-schedule-area-two .tab-content .table tbody tr th {
            border: 0;
            /* padding: 30px 20px; */
            vertical-align: middle;
        }

        .event-schedule-area-two .tab-content .table tbody tr th .event-date span {
            font-size: 50px;
            line-height: 50px;
            font-weight: normal;
        }


        .event-schedule-area-two .tab-content .table tbody tr td {
            /* padding: 30px 20px; */
            vertical-align: middle;
        }

        .event-schedule-area-two .tab-content .table tbody tr td .event-wrap h3 a {
            font-size: 20px;
            line-height: 20px;
            color: #05cfad;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            transition: all 0.4s;
        }

        .event-schedule-area-two .tab-content .table tbody tr td .event-wrap .organizers {
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            margin: 10px 0;
        }

        .event-schedule-area-two .tab-content .table tbody tr td .event-img img {
            width: 80px;
            height: 150px;
            border-radius: 16px;
        }

        .ozetortala {
            height: 102px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

    </style>

</head>

<body>
    <div class="event-schedule-area-two bg-color pad100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                </div>
                <!-- /.col end-->
            </div>
            <!-- row end-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center" scope="col">
                                            <div class="ozetortala"> Sayfa Sayısı</div>
                                        </th>
                                        <th style="text-align: center" scope="col">
                                            <div class="ozetortala"> Kitap Kapağı</div>
                                        </th>
                                        <th style="text-align: center" scope="col">
                                            <div class="ozetortala"> Bilgiler</div>
                                        </th>
                                        <th style="text-align: center" scope="col">
                                            <div class="ozetortala"> Kitap Hakkında</div>
                                        </th>
                                        <th scope="col"><a class="btn btn-secondary" style="color: white"
                                                href="{{ route('profile') }}">{{ auth()->user()->name }}</a>
                                            <a class="btn btn-secondary" style="color: white"
                                                href="{{ route('addbook') }}">Yeni Kitap Ekle</a>
                                            <form action="{{ route('logout') }}" method="POST">
                                                {{ csrf_field() }}
                                                <button class="btn btn-secondary" style="background: #d11e1e"
                                                    type="submit">Çıkış Yap</button>
                                            </form>
                                        </th>    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($book as $book)
                                        <tr class="inner-box">
                                            <th scope="row">
                                                <div class="event-date">
                                                    <span>{{ $book->page_number }}</span>
                                                    <p>Sayfa</p>
                                                </div>
                                            </th>
                                            <td>
                                                <div class="event-img">
                                                    <img src={{ $book->url }} alt="" />
                                                </div>
                                            </td>
                                            <td>
                                                <div class="event-wrap">
                                                    <h3>{{ $book->book_name }}</h3>
                                                    <div class="meta">
                                                        <div class="organizers">
                                                            <h4>{{ $book->author }}</h4>
                                                        </div>
                                                        <div>
                                                            <span>Yayın Tarihi: {{ $book->published_date }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="card">
                                                    <div class="card-body">
                                                        {{ $book->description }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="primary-btn" style="text-align: center">
                                                    <a class="btn btn-info"
                                                        href="{{ 'show/' . $book['id'] }}">Düzenle</a>
                                                </div>
                                                <br>
                                                <div class="primary-btn" style="text-align: center">
                                                    <a class="btn btn-danger"
                                                        href={{ 'destroy/' . $book['id'] }}>Sil</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /col end-->
            </div>
            <!-- /row end-->
        </div>
    </div>
</body>

</html>
