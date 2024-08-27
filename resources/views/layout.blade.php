<html>
<head class="h-full">

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Website title</title>
    @vite(["resources/css/app.css", "resources/js/app.js"])

</head>
<body class="h-full">

<div id="app"></div>

</body>

<script>
    window.Laravel = {!! json_encode([
            'user' => (bool)auth()->user()
        ]) !!};
</script>
</html>
