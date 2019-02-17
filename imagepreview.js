
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };

var reader = new FileReader();
reader.onload = function(event) {
    $scope.src = event.target.result;
}
reader.readAsDataURL(file);
