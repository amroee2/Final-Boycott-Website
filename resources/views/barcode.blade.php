<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>


    <title>Document</title>
</head>
<body>

    <div id="barcode-scanner-container"></div>
<button id="start-scanner">Start Scanner</button>
<button id="stop-scanner" style="display:none;">Stop Scanner</button>

    
</body>


<script>

Quagga.init({
    inputStream: {
        name: "Live",
        type: "LiveStream",
        target: document.querySelector('#barcode-scanner-container'), // Adjust if necessary
    },
    decoder: {
        readers: ["code_128_reader"] // Start with a single reader for testing
    }
}, function(err) {
    if (err) {
        console.log(err);
        return;
    }
    console.log("Initialization finished. Ready to start");
    Quagga.start();
});

Quagga.onDetected(function(result) {
    console.log(result.codeResult.code);
    // Implement your logic here (e.g., stop Quagga, display result, etc.)
});



</script>
</html>