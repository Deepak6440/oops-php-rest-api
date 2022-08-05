<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $("p").click(function(){
    $(this).hide();
  });
});
</script>
</head>
<body>
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Body</th>
        
      </tr>
    </thead>
    <tbody id="load-data">
     
      </tbody>
</table>
<script type="text/javascript">
  $(document).ready(function () {
    $.ajax({
      url : "https://jsonplaceholder.typicode.com/posts",
      type: "GET",
      success : function(data)
      {
       // console.log(data);
        //$("#load-data").append(data.id + "<br/>" + data.title + "");
        var i =1;
        $.each(data,function(key,value){
          console.log(value);
         $("#load-data").append(`<tr> <td> ${i++} </td> <td> ${value.title} </td> <td> ${value.body} </td></tr>`);
        });
        document.write($i);
      }
    });
  });
</script>

</body>
</html>
