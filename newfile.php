<html>
<style>
    body {
        background-color: white;
        color: black;
    }
    input {
        width: 100%;
        background-color: beige;
    }
    a {
        font-family: Trebuchet MS;
        text-decoration: underline darkblue;
        color: darkblue;
    }
</style>
<script src="https://www.gstatic.com/firebasejs/4.1.2/firebase.js"></script>
<script>
    var config = {
    apiKey: "AIzaSyAJ5K8KtDQ3vO-o5QJ0jSeETWJAMhIvezo ",
    authDomain: "independent-eating.firebaseapp.com",
    databaseURL: "https://independent-eating.firebaseio.com",
    projectId: "independent-eating",
    databaseURL: "https://independent-eating.firebaseio.com/",
    storageBucket: "independent-eating.appspot.com"
  };
  firebase.initializeApp(config);
  // Get a reference to the database service

</script>
<body>
<table style="width:100%" id="ex-table">
  <tr>
    <th>RecipeID</th>
    <th>RecipeName</th> 
    <th>OriginalUrl</th>
</table> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    var database = firebase.database();
    database.ref().once('value', function(snapshot){
        if(snapshot.exists()){
            var content = '';
            snapshot.forEach(function(data){
                var val = data.val();
                content +='<tr>';
                content += '<td>' + val.RecipeID + '</td>';
                content += '<td>' + val.RecipeName + '</td>';
                content += '<td><a href=' + val.OriginalUrl + ' target=\"preview\">'+val.OriginalUrl+'</a></td>';
                content += '</tr>';
            });
            $('#ex-table').append(content);
        }
    });
    </script>
</body>
</html>