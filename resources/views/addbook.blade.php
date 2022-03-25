<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>addbook</title>
    <style>
        html,
        body {
            width: 500px;
            margin: auto;
        }

        .container {
            width: 500px;
            margin: 20px auto;
        }

        .preview {
            padding: 10px;
            position: relative;
        }

        .preview i {
            color: white;
            font-size: 35px;
            transform: translate(50px, 130px);
        }

        .preview-img {
            border-radius: 100%;
            box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.7);
        }

        .browse-button {
            width: 204px;
            height: 200px;
            border-radius: 100%;
            position: absolute;
            /* Tweak the position property if the element seems to be unfit */
            top: 10px;
            left: 132px;
            background: linear-gradient(170deg, transparent, rgb(196, 91, 22));
            opacity: 0;
            transition: 0.3s ease;
        }

        .browse-button:hover {
            opacity: 1;
        }

        .browse-input {
            width: 200px;
            height: 200px;
            border-radius: 100%;
            transform: translate(-1px, -26px);
            opacity: 0;
        }

        .form-group {
            width: 250px;
            margin: 10px auto;
        }

        .form-group input {
            transition: 0.3s linear;
        }

        .form-group input:focus {
            border: 1px solid crimson;
            box-shadow: 0 0 0 0;
        }

        .Error {
            color: crimson;
            font-size: 13px;
        }

        .Back {
            font-size: 25px;
        }

        header img {
            display: block;
            margin: 0 auto;
        }

        header span {
            position: absolute;
            top: 36%;
            left: 18%;
            font-size: 28px;
            color: #fff;
        }

        .para {
            margin-left: 13%;
            width: 75%;
        }

        .btn-success {
            margin-left: 42%;
            margin-top: 2%;
            cursor: pointer;
        }

        h2 {
            color: #218838;
        }

        section {
            margin-top: 20px;
        }

        /*Takvim*/
        header img {
            display: block;
            margin: 0 auto;
        }

        header span {
            position: absolute;
            top: 36%;
            left: 18%;
            font-size: 28px;
            color: #fff;
        }

        .para {
            margin-left: 13%;
            width: 75%;
        }

        .btn-success {
            margin-left: 42%;
            margin-top: 2%;
            cursor: pointer;
        }

        h2 {
            color: #218838;
        }

        section {
            margin-top: 20px;
        }

    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    {{-- DATE KISMI --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
</head>

<body>
    <div class="container">
        <p class="h2 text-center">KİTAP EKLE</p>
        <form action="{{ route('bookApi') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (\Session::has('error'))
                <div id="error" class="alert alert-danger">
                    {!! \Session::get('error') !!}
                </div>
            @endif
            <div class="preview text-center">
                <img class="preview-img"
                    src="{{ 'https://www.shareicon.net/data/256x256/2016/06/27/623443_book_256x256.png' }}"
                    width="200" height="200" />
                <div class="browse-button" style="overflow: hidden">
                    <x-fileicon-photorec style="height: 200 ; width:200" />
                    <input class="browse-input" type="file" name="UploadedFile" id="UploadedFile" />
                </div>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Kitap Adı:</label>
                <input type="text" class="form-control" name="book_name" placeholder="Kitap Adı">
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Yazar Adı:</label>
                <input type="text" class="form-control" name="author" placeholder="Yazar">
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Sayfa Sayısı:</label>
                <input type="text" class="form-control" name="page_number" placeholder="Sayfa Sayısı">
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Açıklama/Özet:</label>
                <input type="text" class="form-control" name="description" placeholder="Açıklama">
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Yayın Tarihi:</label>
                <input type="text" placeholder="Yayın Tarihi" id="datepicker" size="30" class="form-control"
                    name="published_date">
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <input class="btn btn-outline-secondary btn-lg btn-block" style="background-color:#FF5733 "
                    type="submit" value="Kaydet" />
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    {{-- DATE DENEME --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: "dd/mm/yy"
            });
            $("#format").on("change", function() {
                $("#datepicker").datepicker("option", "dateFormat", $(this).val());
            });
        });
    </script>
</body>

</html>
