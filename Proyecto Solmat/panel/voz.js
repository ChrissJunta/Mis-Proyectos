if (annyang) {
    var comandos = {
      'hola': function() {
        alert("HOLA!!!");
      },
      'juego de memoria': juegomemoria,
      'memoria': juegomemoria,
      'cerdito': juegomemoria,
      'cerdo': juegomemoria,
      'chanchito': juegomemoria,
      'puerquito': juegomemoria,
      'chancho': juegomemoria,
      'puerco': juegomemoria,
      'vaca': sopaletras,
      'vaquita': sopaletras,
      'juego de sopa de letras': sopaletras,
      'sopa de letras': sopaletras,
      'como se juega': instruccionesmemoria,
      'instrucciones': instruccionesmemoria,
      'como juego': instruccionesmemoria,
      'que tengo que hacer': instruccionesmemoria,
      'buscar *tag': buscador,
      'buscar informacion de *tag': buscador,
      'que significa *tag': buscador,
      'que es la dislexia': dislexia,
      'que la dislexia': dislexia,
      'la dislexia': dislexia,
      'cerrar': cerrar,
      'regresar': regresar,
      'volver a la granja': regresar,
      'granja': regresar,
      'volver al menu': regresar

    };
    annyang.addCommands(comandos);
    annyang.setLanguage("es-MX");
    annyang.start();
  }

  var video = document.getElementById("mivideo");
  function reproducirVideo() {
    video.play();
  }

  function pausarVideo() {
    video.pause();
  }

  function instruccionesmemoria() {
    Swal.fire({
        
        html: `<audio src="./audio/juegomemoria.mp4" autoplay>
        <p>Tu navegador no implementa el elemento audio.</p>
        </audio>
        <img src="./img/pocoyo.gif" alt="Funny image"> 
         `,
        confirmButtonText: "Cerrar",
        allowOutsideClick: false,
        allowEscapeKey: false,
    });
}

function juegomemoria() {
    
    location.href = "memoria.html";
     
}

function sopaletras() {
    
  location.href = "sopaletras.html";
   
}


function buscador(tag) {
    
    location.href = "https://www.google.com/search?sxsrf=ALeKk02bxBAzpJOuhxiSI5i94ft2bozaYw%3A1597919844389&ei=ZFI-X8uoF8r85gLro6fYCg&q="+tag+"&oq="+tag+"&gs_lcp=CgZwc3ktYWIQAzIKCC4QsQMQQxCTAjIFCC4QsQMyBQgAELEDMgUILhCxAzICCC4yAgguMgUILhCxAzICCC4yAgguMgIILjoJCC4QJxATEJMCOgQILhAnOggILhCxAxCDAToCCABQ7SpY3S9g_jBoAHAAeACAAZMBiAGSBZIBAzAuNZgBAKABAaoBB2d3cy13aXrAAQE&sclient=psy-ab&ved=0ahUKEwjL6tCly6nrAhVKvlkKHevRCasQ4dUDCAw&uact=5";
    
  }

  function dislexia() {
    
    location.href = "http://www.ladislexia.net/definicion-dislexia/";
    
  }

  function sopaletraspocoyo() {
    
      Swal.fire({
          
          html: `<audio src="./audio/juegosilabas.mp4" autoplay>
          <p>Tu navegador no implementa el elemento audio.</p>
          </audio>
          <img src="./images/pocoyo.gif" alt="Funny image"> 
           `,
          confirmButtonText: "Cerrar",
          allowOutsideClick: false,
          allowEscapeKey: false,
      });
  
  }

  function cerrar() {
    
    location.href = "memoria.html";
    
  }

  function regresar() {
    
    location.href = "indexfondo.php";
    
  }