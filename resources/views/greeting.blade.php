<!-- View stored in resources/views/greeting.blade.php -->
<html>
<body>

<h1>Hello, {{ $name }} </h1>
<h1>Hello, <?php echo $name; ?> </h1>

<!-- View stored in resources/views/greeting.blade.php -->

<h1>Hello, {{ $name }} {{ $last_name }} </h1>
<h1>Hello, {{ $name . " " . $last_name }} </h1>

</body>
</html>
