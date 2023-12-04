
<center>
  <div class="container">
    <div id="interactive" style="width: 100%;"></div>
  </div>
</center>


















<script src="js/quagga.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>







<script>
  $(document).ready(function() {
    // Set the video width
    $('#interactive video').css('width', '346px');

    // Configuration for QuaggaJS
    const config = {
      inputStream: {
        name: "Live",
        type: "LiveStream",
        target: "#interactive",
      },
      decoder: {
        readers: ["code_128_reader"],
      },
    };

    // Initialize QuaggaJS with the provided configuration
    Quagga.init(config, function(err) {
      if (err) {
        console.error("Error initializing Quagga:", err);
        return;
      }

      // Once QuaggaJS is initialized, start the scanner
      Quagga.start();

      // Add event listener to handle scanned results
      Quagga.onDetected(function(result) {
        const code = result.codeResult.code;




        
        alert(code);

        // Uncomment the following line if you want to stop the scanner after detecting a code
        // Quagga.stop();
      });
    });
  });
</script>

<!-- Closing tags -->
</body>
</html>