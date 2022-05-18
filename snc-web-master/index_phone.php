<html>
<head>
    <title>Phone Number Authentication with Firebase Web</title>
    <script src="./js/NumberAuthentication.js" type="text/javascript"></script>
</head>
<body>
<h1>Enter number to create account</h1>
<form>
    <input type="text" id="number" placeholder="+91**********">
    <div id="recaptcha-container"></div>
    <button type="button" onclick="phoneAuth();">SendCode</button>
</form><br>
<h1>Enter Verification code</h1>
<form>
    <input type="text" id="verificationCode" placeholder="Enter verification code">
    <button type="button" onclick="codeverify();">Verify code</button>

</form>


<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.24.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.24.0/firebase-auth.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.24.0/firebase-analytics.js"></script>

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyB6HB2bCp5dVGda3oIL8jrBxgIBo4Ou1Js",
    authDomain: "votingauth.firebaseapp.com",
    databaseURL: "https://votingauth.firebaseio.com",
    projectId: "votingauth",
    storageBucket: "votingauth.appspot.com",
    messagingSenderId: "644999803539",
    appId: "1:644999803539:web:71000d63536a42d9c7d366",
    measurementId: "G-34PKXD11L1"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>

</body>
</html>