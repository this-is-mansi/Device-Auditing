<script src="ht.js"></script>
<style>
  .result {
    background-color: green;
    color: #fff;
    padding: 20px;
  }

  .row {
    display: flex;
  }
</style>
<div class="row">
  <div class="col">
    <div style="width:500px;" id="reader"></div>
  </div>
  <audio id="myAudio1">
    <source src="found.wav" type="audio/ogg">
  </audio>
  <audio id="myAudio2">
    <source src="notfound.wav" type="audio/ogg">
  </audio>
  <script>
    var x = document.getElementById("myAudio1");
    var x2 = document.getElementById("myAudio2");

    function showHint(str) {
      if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
      }
    }

    function playAudio() {
      x.play();
    }
  </script>
  <div class="col" style="padding:30px;">
    <h4 style="display:none">SCAN RESULT</h4>
    <div style="display:none" >Asset Tag</div>
    <form action="anotherscreen.html" method="get">
      <input style="display:none" type="text" name="start" class="input" id="result" onkeyup="showHint(this.value)" placeholder="result here" readonly="" />
    </form>
    <p style="display:none">Status: <span id="txtHint"></span></p>
    <!-- Go Back button -->
    <!-- <button onclick="goBack()">insert in sheet</button> -->
  </div>
</div>
  <script type="text/javascript">
    var html5QrcodeScanner = new Html5QrcodeScanner(
      "reader", {
        fps: 10,
        qrbox: 250,
        ignoreReadBeforeScan: true,
        ignoreDuplicateReads: true
      }
    );

    html5QrcodeScanner.render(onScanSuccess, onScanError);

    function onScanSuccess(qrCodeMessage) {
      document.getElementById("result").value = qrCodeMessage;
      showHint(qrCodeMessage);
      goBack();
      // playAudio();
    }

    function onScanError(errorMessage) {
      // handle scan error
    }

    // Function to go back
    function goBack() {
      // Assuming you want to pass the value to another_screen.html
      var resultValue = document.getElementById("result").value;
      window.location.href = "anotherscreen.html?start=" + encodeURIComponent(resultValue);
    }
  </script>
