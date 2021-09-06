<!DOCTYPE html>
<html>
<head>
  <script src="https://unpkg.com/vue"></script> 
  <script src="https://unpkg.com/vue-picture-input"></script> 
  <title>In the browser!</title>
</head>
<body>
  <div id="app">
    <p>teste</p>
    <picture-input 
      ref="pictureInput" 
      @change="onChange" 
      width="600" 
      height="600" 
      margin="16" 
      accept="image/jpeg,image/png" 
      size="10" 
      buttonClass="btn"
      :customStrings="{
        upload: '<h1>Bummer!</h1>',
        drag: 'Drag a 😺 GIF or GTFO'
      }">
    </picture-input>
  </div>
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        message: 'Hello Vue!'
      },
      components: {
        'picture-input': PictureInput
      }
    })
  </script> 
</body>
</html>