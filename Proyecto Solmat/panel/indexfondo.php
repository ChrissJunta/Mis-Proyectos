
<html lang="en">
<link rel="stylesheet" href="css/stylejuego.css" type="text/css" media="all">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">

  <head>

  

  <style>
  body {
  
    background: url(img/granja2.jpg) ;
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;

}
  </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
 <body>

  <script src="//cdnjs.cloudflare.com/ajax/libs/annyang/2.6.0/annyang.min.js"></script>
  <script src="voz.js" ></script>

  
  <audio src="audio/fondo.mp3"
       autoplay>
  Your browser does not support the <code>audio</code> element.
  </audio>

  <div >
    <div>
    <CENTER><br><h1>BIENVENIDOS A LA GRANJA</CENTER>
    </div>
    <center>
      <table border="0">
      
      <tr>
      <td><image src="img/espacio.png" width="100" height="140"></td>
      <td><image src="img/espacio.png" width="100" height="140"></td>
      <td><image src="img/espacio.png" width="100" height="140"></td>
      <td><image src="img/espacio.png" width="100" height="140"></td>
      </tr>
      <tr>
      <td><a href="memoria.html"><h1>Juego de Memoria</a></td>
      <td><image src="img/espacio.png" width="100" height="100"></td>
      <td><image src="img/espacio.png" width="100" height="100"></td>
      <td><a href="memoria.html"><h1>Sopa de letras</td>
      </tr>
      <tr>
      <td><a @click="juegomemoria" href="memoria.html"><image src="img/cerdo.png" width="300" height="300"></a></td>
      <td><image src="img/espacio.png" width="250" height="300"></td>
      <td><image src="img/espacio.png" width="250" height="300"></td>
      <td><a @click="juegomemoria" href="sopaletras/"><image src="img/vaca.png" width="300" height="300"></a></td></tr>
      
      
      </table>
      </center>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>