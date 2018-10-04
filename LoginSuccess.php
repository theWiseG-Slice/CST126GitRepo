<?php

echo $_SESSION['uname'];
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("[data-toggle=tooltip]").tooltip();
    });
</script>
<html>
<head>
    <title>Taco's Blog</title>
    <link type = "text/css" rel="stylesheet" href="style.css"/>
</head>
<div id="wrapper">
    <div id = "header">
        <div id="post">
            <h1>Post Tilte</h1>
            <p> This is sample test</p>
        </div>
    </div>

</div>

<div class="container">
    <div class="row">
        <h3>Comments</h3>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="widget-area no-padding blank">
                <div class="status-upload">
                    <form action="PostContentResult.php" >
                        <input type="hidden" name="uname" value="<?php echo $_SESSION['uname'];?>">

                        <textarea placeholder="Post your comment here?" name = "comment"></textarea>
                        <ul>
                            <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Audio"><i class="fa fa-music"></i></a></li>
                            <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><i class="fa fa-video-camera"></i></a></li>
                            <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Sound Record"><i class="fa fa-microphone"></i></a></li>
                            <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><i class="fa fa-picture-o"></i></a></li>
                        </ul>
                        <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Share</button>
                    </form>
                </div><!-- Status Upload  -->
            </div><!-- Widget Area -->
        </div>

    </div>
</div>
</html>