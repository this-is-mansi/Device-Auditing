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
    <div style="width:900px; " id="reader">
    <div id="reader__scan_region" style="display:none;width: 100%; min-height: 100px; text-align: center; position: relative;"><video playsinline="" style="width: 900px;"></video><canvas id="qr-canvas" width="500" height="500" style="width: 500px; height: 500px; display: none;"></canvas><div id="qr-shaded-region" style="position: absolute; border-width: 87.5px 200px; border-style: solid; border-color: rgba(0, 0, 0, 0.48); box-sizing: border-box; inset: 0px;"><div style="position: absolute; background-color: rgb(255, 255, 255); width: 40px; height: 5px; top: -5px; left: 0px;"></div><div style="position: absolute; background-color: rgb(255, 255, 255); width: 40px; height: 5px; top: -5px; right: 0px;"></div><div style="position: absolute; background-color: rgb(255, 255, 255); width: 40px; height: 5px; top: 505px; left: 0px;"></div><div style="position: absolute; background-color: rgb(255, 255, 255); width: 40px; height: 5px; top: 505px; right: 0px;"></div><div style="position: absolute; background-color: rgb(255, 255, 255); width: 5px; height: 45px; top: -5px; left: -5px;"></div><div style="position: absolute; background-color: rgb(255, 255, 255); width: 5px; height: 45px; top: 465px; left: -5px;"></div><div style="position: absolute; background-color: rgb(255, 255, 255); width: 5px; height: 45px; top: -5px; right: -5px;"></div><div style="position: absolute; background-color: rgb(255, 255, 255); width: 5px; height: 45px; top: 465px; right: -5px;"></div></div></div>
 </div>
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
        xmlhttp.open("POST", "gethint.php?q=" + str, true);
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
    <form action="anotherscreen.html" method="POST">
      <input type="text" style="display:none" name="start" class="input" id="result" onkeyup="showHint(this.value)" placeholder="result here" readonly="" />
    </form>
    <p style="display:none">Status: <span id="txtHint"></span></p>
   
  </div>
</div>
<script>
 
        // Function to get URL parameters by name
        function getUrlParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        }

    </script>

  <script type="text/javascript"> 
  var a;
    var html5QrcodeScanner = new Html5QrcodeScanner(
      "reader", {
        fps: 10,
        qrbox: 500,
        ignoreReadBeforeScan: true,
        ignoreDuplicateReads: true
      }
    );

    

    function onScanSuccess(qrCodeMessage) {
      callAnotherPHP();
      document.getElementById("result").value = qrCodeMessage;
      showHint(qrCodeMessage);
     
    }
    
    function onScanError(errorMessage) {
      // handle scan error
    }


  html5QrcodeScanner.render(onScanSuccess, onScanError);

function callAnotherPHP() {
    var xhttp = new XMLHttpRequest();
    var url = "another.php";
    var params = "start=" + encodeURIComponent(document.getElementById("result").value);
    xhttp.open("POST", url, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  // if(encodeURIComponent(document.getElementById("result").value)!='')
    xhttp.send(params);
    
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                if (this.responseText === '1') {
                    x.play();
                    console.log( params)
                   a=1;
                  goBack();
              

                } else if (this.responseText === '2') {
                    x2.play();
                    a=23;
                    console.log( params)
                   goBack();
                
         
                }
              
               
            } else {
                console.error("Error: " + this.statusText);
            }
        }
    };


}

 
// console.log(a);
    function goBack() {
      console.log("a is ",a);
      var iValue = getUrlParameter('i');
  var resultValue = document.getElementById("result").value;
  var currentURL = window.location.href;
  var baseURL = currentURL.substring(0, currentURL.lastIndexOf("/"));
  var newURL = baseURL + "/index1.php";

  setTimeout(function() {
        window.location.href = newURL + "?start=" + encodeURIComponent(resultValue) + "&i=" + a;
    }, 500);
  
}

$(".cta").click(function(){
  $(this).addClass("active").delay(150).queue(function(next){
    $(this).removeClass("active");
    next();
  });
});

  </script>


