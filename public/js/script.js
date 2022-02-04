function onScanSuccess(decodedText, decodedResult) {
    html5QrcodeScanner.clear();
    let input = document.getElementById('barcode');
    let button = document.getElementById('barcodesearch');
    console.log(`Code matched = ${decodedText}`, decodedResult);
    input.value = decodedText;
    button.click();
  }
  
  function onScanFailure(error) {
    // handle scan failure, usually better to ignore and keep scanning.
    // for example:
    //console.warn(`Code scan error = ${error}`);
  }
  
  let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader",
    { fps: 10, qrbox: {width: 250, height: 250} },
    /* verbose= */ false);
  html5QrcodeScanner.render(onScanSuccess, onScanFailure);