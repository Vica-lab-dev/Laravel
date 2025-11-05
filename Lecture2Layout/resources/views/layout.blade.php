<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("PageTitle")</title>
</head>
<body>
    @include("navigation")
    @yield("form")
    @yield("map")
    @yield("PageContent")
    @yield("shopSection")
    @yield("p")
    @include("footer")

</body>
</html>
