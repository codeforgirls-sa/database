// Initialize Firebase (ADD YOUR OWN DATA)
var firebaseConfig = {
  apiKey: "AIzaSyDmGWSLvbnL_X6IeM_hN5anEDfkEFjhUXs",
  authDomain: "fir-637b7.firebaseapp.com",
  databaseURL: "https://fir-637b7.firebaseio.com",
  projectId: "fir-637b7",
  storageBucket: "fir-637b7.appspot.com",
  messagingSenderId: "259554873685",
  appId: "1:259554873685:web:b644ab6695cf163a3e9fdc"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

// Reference messages collection
// Get a reference to the database service
var database = firebase.database();
var messagesRef = firebase.database().ref('messages');

// Listen for form submit
document.getElementById('contactForm').addEventListener('submit', submitForm);


// Submit form
function submitForm(e){
  e.preventDefault();
  
  readTask();
  
  // Get values
  var name = getInputVal('name');
  var company = getInputVal('company');
  var email = getInputVal('email');
  var phone = getInputVal('phone');
 
  console.log(name, company, email, phone);

  // Save message
  saveMessage(name, company, email, phone);

  // Show alert
  document.querySelector('.alert').style.display = 'block';

  // Hide alert after 3 seconds
  setTimeout(function(){
    document.querySelector('.alert').style.display = 'none';
  },3000);

  // Clear form
  document.getElementById('contactForm').reset();
}

// Function to get form values
function getInputVal(id){
  return document.getElementById(id).value;
}

// "Insert Query" Save message to firebase
function saveMessage(name, company, email, phone){
  var newMessageRef = messagesRef.push();
  newMessageRef.set({
    name: name,
    company:company,
    email:email,
    phone:phone
  });

}

//**TODO**: Print user infromation

