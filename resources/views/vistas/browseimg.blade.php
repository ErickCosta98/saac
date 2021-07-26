<!DOCTYPE html>
<html >
<head>
    <title>Buscador de imagenes</title>
    <style>
        body{
            font-family: 'Segoe UI',  Verdana, Helvetica,sans-serif;
            font-size: 80%;
        }
        #form{
            width: 600px;
        }
        #folderExplorer{
            float: left;
            width: 100px;
        }
        #fileExplorer{
            float: left;
            width: 680px;
            border-left: 1px solid #dff0ff ;
        }
        .thumbnail{
            float: left;
            margin: 3px;
            padding: 3px;
            border: 1px solid #dff0ff ;

        }
        ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        li{
            padding: 0;
        }
    </style>
<script src="{{ asset('js/app.js') }}" ></script>

<script src="{{ asset('src/ckeditor/ckeditor.js') }}"></script>    
<script type="text/javascript">
$(document).ready(function () {
    var funcNum = <?php echo $_GET['CKEditorFuncNum'].';'; ?>
    $('img').on('click',function() {
       var fileUrl = $(this).attr('title');
       window.opener.CKEDITOR.tools.callFunction(funcNum,fileUrl);
       window.close();
    }).hover(function () {
        $(this).css('cursor','pointer');    
    });
});
</script>
</head>
<body>
    <div class="fileExplorer">
        @foreach ( $urls as $url )
            <div class="thumbnail">
                <img src="{{asset($url->url)}}" alt="thumb" width="120" title="{{$url->url}}">
                </div>
        @endforeach
        </div>
</body>
</html>