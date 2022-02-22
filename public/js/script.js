function onScanSuccess(decodedText, decodedResult) {
      quicksearch = quicksearch.replace(':id', parseInt(decodedText));
      document.location.href = quicksearch;
      html5QrcodeScanner.clear();
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

function formatRSD(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
}