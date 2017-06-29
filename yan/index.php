<?php
if (isset($_GET['callback'])) {
    $arr = array('a' => 1, 'b' => 2, 'c' => 3);
    echo $_GET['callback'] . '(' . json_encode($arr) . ')';
} else {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>

<button type="button" id="btn">Click me</button>

<script>
(function () {
  var module = { exports: {} }
  var require = function() { return function() {} }

  <?php include '../index.js'; ?>

  debug = noop
  window.jsonp = jsonp
})();

document.getElementById('btn').onclick = function () {
  jsonp('index.php', function (err, data) {
    if (err) throw err
    console.log(data)
  })
}
</script>
</body>
</html>
<?php } ?>
