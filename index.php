<!DOCTYPE html>
<html>
  <head>
    <title>Universal Textiles</title>
    <link
      rel="stylesheet"
      href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css"
    />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>
  <body>
    <div class="col-sm-6 col-sm-offset-3">
      <h1>Packs to send out, for any given order size.</h1>

      <form action="index.php" method="POST">
        <div id="tshirtno-group" class="form-group">
          <label for="tshirtno">No. of T-shirt ordered</label>
          <input
            type="number"
            class="form-control"
            id="tshirtno"
            name="tshirtno"
            placeholder="Number"
          />
        </div>     

        <button type="submit" class="btn btn-success">
          Submit
        </button>
      </form>

      <div class="row">
      <div class="col-sm-10 col-sm-offset-3" id="result">
      </div>

    </div>
  </body>
</html>

<script>
$(document).ready(function () {
  $("form").submit(function (event) {
    var value= $(this).serialize();
    $.ajax({
      type: "POST",
      url: "process.php",
      data: value,
    }).done(function (data) {
      console.log(data);
      $("#result").html(data);
    });

    event.preventDefault();
  });
});
</script>