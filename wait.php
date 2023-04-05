<!DOCTYPE html>
<html>
<head>
    <title>Please wait...</title>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="7; url=<?php echo $_GET['url']; ?>">
    <style>
		iframe {
			display: block;
			margin: 0 auto;
		}
        p.middle {
            text-align: center;
            font-size: 2rem;
            margin: 10 auto;
        }
	</style>
</head>
<body>
    <p class="middle">Please wait while you are being redirected...</p>
    <div class="container">
        <div class="height">
            <div class="row">
            <iframe width="800" height="400" src="https://www.youtube.com/embed/hPr-Yc92qaY?controls=0&autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen class="video"></iframe>
            </div>
        </div>
    </div>
</body>
</html>