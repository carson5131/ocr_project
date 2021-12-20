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
    <div class="container">
        {{-- <form action="{{ route('search-keyword') }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }} --}}
            <div class="row">
                <div class="card" style="margin-left: auto; margin-right: auto; width:50%;">
                    <div class="card-header">
                        <p>Search</p>
                    </div>
                    <div class="card-body" id="ad">
                        <label for="description">Description: </label>
                        <input type="input" name="description" id="desc">
                        <button type="button" id="search-keyword">search</button>
                    </div>
                </div>
            </div>
        {{-- </form> --}}
        <div class="row">
            <div id="result">
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function () {
        $("#search-keyword").on("click", function() {
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "search-keyword",
                data: {
                    '_token': $('meta[name="_token"]').attr('content'),
                    'description': $("#desc").val(),
                },
                success: function(result) {
                    $("#result").html(result);
                }
            });
        })
    });
</script>
</html>
