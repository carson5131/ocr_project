<!DOCTYPE html>
<html>

<head>
    <title>Laravel Cropper js - Crop Image Before Upload - Tutsmake.com</title>
    <meta name="_token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
</head>
<style type="text/css">
    img {
        display: block;
        max-width: 100%;
    }

    .preview {
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }

    .modal-lg {
        max-width: 1000px !important;
    }

</style>

<body>
    <form action="{{ route('upload-file') }}" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <input type="file" name="invoice_file">
        <button type="submit">upload</button>
    </form>
    <div class="row">
        <div class="mt-2 col-6 p-4">
            <div class="card">
                <h2 class="card-header">Check side by side</h2>
                <div class="card-body">
                    <h5 class="card-title">Please Seletesss Image For Cropping</h5>
                    <img src="data:image/png;base64,{{$img}}" alt="">
                </div>
            </div>
        </div>
        <div>
            <table>
                @foreach ($datas as $key => $data)
                <tr>
                    <td>{{$key}}</td>
                    <td>{{ $data }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>
