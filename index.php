<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styless.css">
    <link rel="stylesheet" href="https://pyscript.net/latest/pyscript.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <script defer src="https://pyscript.net/latest/pyscript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <title>Querry </title>
  </head>
  <body class="body">
    <div class="left">
      <img src="https://i.ibb.co/7Ntfz8w/logo.jpg" class="logo">
     </div> 
     <p class="headline">Querry: Your Virtual Classroom Assistant</p>
      <div class="output">
      <div class="botreply">
      <p class="reply" id="tt">....</p>
      </div>
      <div id="result">
      </div>
    </div>
    <div class="right">
      <a href="upload.php" target="_blank"  > <img src="searchh.png" alt="HELLO" class="upld" > </a>
</div>
      <form class="jsp" action="#" method="post">
        <input type="text" id="test" placeholder="Search.." class="my-input" name="search">
        <button type="button" value="submit" class="my-button" py-onClick="ldd()" id = "123" name="save"><img src="button.png" alt="" height="20px" width="20px;"></button>
      </form>

<py-script>
        import re
        import random


        def message_probability(user_message, recognised_words, single_response=False, required_words=[]):
            message_certainty = 0
            has_required_words = True

            # Counts how many words are present in each predefined message
            for word in user_message:
                if word in recognised_words:
                    message_certainty += 1

            # Calculates the percent of recognised words in a user message
            percentage = float(message_certainty) / float(len(recognised_words))

            # Checks that the required words are in the string
            for word in required_words:
                if word not in user_message:
                    has_required_words = False
                    break

            # Must either have the required words, or be a single response
            if has_required_words or single_response:
                return int(percentage * 100)
            else:
                return 0

        def unknown():
            response = ["Could you please re-phrase that? ",
                        "...",
                        "Sounds about right.",
                        "What does that mean?"][
                random.randrange(4)]
            return response

        R_EATING = "I don't like eating anything because I'm a bot obviously!"
        R_ADVICE = "If I were you, I would go to the internet and type exactly what you wrote there!"


        def check_all_messages(message):
            highest_prob_list = {}

            # Simplifies response creation / adds it to the dict
            def response(bot_response, list_of_words, single_response=False, required_words=None):
                if required_words is None:
                    required_words = []
                nonlocal highest_prob_list
                highest_prob_list[bot_response] = message_probability(message, list_of_words, single_response, required_words)

            # Responses -------------------------------------------------------------------------------------------------------
            response('Hello!', ['hello', 'hi', 'hey', 'sup', 'heyo'], single_response=True)
            response('See you!', ['bye', 'goodbye'], single_response=True)
            response('I\'m doing fine, and you?', ['how', 'are', 'you', 'doing'], required_words=['how'])
            response('You\'re welcome!', ['thank', 'thanks'], single_response=True)
            response('I am great and what about you??', ['how','are' , 'you'] )
            response('Here is what i found', ['can','you','find','give','me'])
            response('I am Querry your online class assistant', ['who','are','you'])

            # Longer responses
            response(R_ADVICE, ['give', 'advice'], required_words=['advice'])
            response(R_EATING, ['what', 'you', 'eat'], required_words=['you', 'eat'])

            best_match = max(highest_prob_list, key=highest_prob_list.get)
            #print(highest_prob_list)
            #print(f'Best match = {best_match} | Score: {highest_prob_list[best_match]}')

            return unknown() if highest_prob_list[best_match] < 1 else best_match


        # Used to get the response
        def get_response(user_input):
            split_message = re.split(r'\s+|[,;?!.-]\s*', user_input.lower())
            response = check_all_messages(split_message)
            return response


        # Testing the response system
        def ldd():
            fn = Element('test').element.value;
            Element("tt").element.innerHTML = get_response(fn)
            #print(get_response(fn))

      </py-script>
      

<script>
$(document).ready(function(){

 //load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
//   if (result.error == "true")
//       {

//       }
  });
 }
// $('#displaybtn').click(function (e){
// 	e.preventDefault();
$('.my-button').on('click', function() {
  // Get the value of the input field
  var inputValue = $('.my-input').val();
  //console.log(inputValue); // Output the value to the console
  //load_data(inputValue);
  inputValue = inputValue.toLowerCase();
  var parts = inputValue.split(" ");
  console.log(parts);
  var filtered;
//  parts.toLowerCase();
/*  if (parts.includes("module")){
     alert("YES");
     var index = parts.indexOf("module");
     parts[index] = 'mod';
     console.log(parts);
  }
  //func to take module no
  if (parts.includes("chapter1") || parts.includes("chapter2") ||parts.includes("chapter3") || parts.includes("chapter4") || parts.includes("chapter5") || parts.includes("chapter6"))
  {
    var emin = inputValue.split();
    numb = emin[0].replace(/\D+/g, ' ').trim().split(' ').map(e => parseInt(e));
    console.log(numb);
  }*/
 if (parts.includes("chapter") ||  parts.includes("chapter1") || parts.includes("chapter2") ||parts.includes("chapter3") || parts.includes("chapter4") || parts.includes("chapter5") || parts.includes("chapter6") ){
     //alert("YES");
     var index = parts.indexOf("chapter");
     if (index !== -1){ 
      parts[index] = 'mod';
      }
     index = parts.indexOf("chapter1");
     numc = 1;
     if (index !== -1){
     parts[index] = 'mod1';
      }
       index = parts.indexOf("chapter2");
     numc = 1;
     if (index !== -1){
     parts[index] = 'mod2';
      }
       index = parts.indexOf("chapter3");
     numc = 1;
     if (index !== -1){
     parts[index] = 'mod3';
      }
       index = parts.indexOf("chapter4");
     numc = 1;
     if (index !== -1){
     parts[index] = 'mod4';
      }
       index = parts.indexOf("chapter5");
     numc = 1;
     if (index !== -1){
     parts[index] = 'mod5';
      }
       index = parts.indexOf("chapter6");
     numc = 1;
     if (index !== -1){
     parts[index] = 'mod6';
      }
     console.log(parts);
  }
  if (parts.includes("module") ||  parts.includes("module1") || parts.includes("module2") ||parts.includes("module3") || parts.includes("module4") || parts.includes("module5") || parts.includes("module6") ){
     //alert("YES");
     var index = parts.indexOf("module");
     if (index !== -1){ 
      parts[index] = 'mod';
      }
     index = parts.indexOf("module1");
     numc = 1;
     if (index !== -1){
     parts[index] = 'mod1';
      }
       index = parts.indexOf("module2");
     numc = 1;
     if (index !== -1){
     parts[index] = 'mod2';
      }
       index = parts.indexOf("module3");
     numc = 1;
     if (index !== -1){
     parts[index] = 'mod3';
      }
       index = parts.indexOf("module4");
     numc = 1;
     if (index !== -1){
     parts[index] = 'mod4';
      }
       index = parts.indexOf("module5");
     numc = 1;
     if (index !== -1){
     parts[index] = 'mod5';
      }
       index = parts.indexOf("module6");
     numc = 1;
     if (index !== -1){
     parts[index] = 'mod6';
      }
     console.log(parts);
  }
   
//DBMS

   if (parts.includes("dbms1") || ( parts.includes("dbms") && parts.includes("mod1") ) || (parts.includes("dbms") && parts.includes("mod") && parts.includes("1"))== true) {
    //alert("Yes, the value exists!")
     filtered = 'dbmsmod1';
  }
    else if (parts.includes("dbms2") || ( parts.includes("dbms") && parts.includes("mod2") ) || (parts.includes("dbms") && parts.includes("mod") && parts.includes("2"))== true) {
    //alert("Yes, the value exists!")
     filtered = 'dbmsmod2';
  }
  else if (parts.includes("dbms3") || ( parts.includes("dbms") && parts.includes("mod3") ) || (parts.includes("dbms") && parts.includes("mod") && parts.includes("3"))== true) {
    //alert("Yes, the value exists!")
     filtered = 'dbmsmod3';
  }
  else if (parts.includes("dbms4") || ( parts.includes("dbms") && parts.includes("mod4") ) || (parts.includes("dbms") && parts.includes("mod") && parts.includes("4"))== true) {
    //alert("Yes, the value exists!")
     filtered = 'dbmsmod4';
  }
  else if (parts.includes("dbms5") || ( parts.includes("dbms") && parts.includes("mod5") ) || (parts.includes("dbms") && parts.includes("mod") && parts.includes("5"))== true) {
    //alert("Yes, the value exists!")
     filtered = 'dbmsmod5';
  }
  else if (parts.includes("dbms6") || ( parts.includes("dbms") && parts.includes("mod6") ) || (parts.includes("dbms") && parts.includes("mod") && parts.includes("6"))== true) {
    //alert("Yes, the value exists!")
     filtered = 'dbmsmod6';
  }
    else if (parts.includes("dbms") || ( parts.includes("dbms") && parts.includes("mod") ) || (parts.includes("dbms") && parts.includes("mod"))== true) {
    //alert("Yes, the value exists!")
     filtered = 'DBMS';
  }


//AOA
   else if (parts.includes("aoa1") || ( parts.includes("aoa") && parts.includes("mod1") ) || (parts.includes("aoa") && parts.includes("mod") && parts.includes("1"))== true) {
    
    filtered = 'aoamod1';
 }
   else if (parts.includes("aoa2") || ( parts.includes("aoa") && parts.includes("mod2") ) || (parts.includes("aoa") && parts.includes("mod") && parts.includes("2"))== true) {
   
    filtered = 'aoamod2';
 }
 else if (parts.includes("aoa3") || ( parts.includes("aoa") && parts.includes("mod3") ) || (parts.includes("aoa") && parts.includes("mod") && parts.includes("3"))== true) {
   
    filtered = 'aoamod3';
 }
 else if (parts.includes("aoa4") || ( parts.includes("aoa") && parts.includes("mod4") ) || (parts.includes("aoa") && parts.includes("mod") && parts.includes("4"))== true) {
   
    filtered = 'aoamod4';
 }
 else if (parts.includes("aoa5") || ( parts.includes("aoa") && parts.includes("mod5") ) || (parts.includes("aoa") && parts.includes("mod") && parts.includes("5"))== true) {
   
    filtered = 'aoamod5';
 }
 else if (parts.includes("aoa6") || ( parts.includes("aoa") && parts.includes("mod6") ) || (parts.includes("aoa") && parts.includes("mod") && parts.includes("6"))== true) {
   
    filtered = 'aoamod6';
 }
   else if (parts.includes("aoa") || ( parts.includes("aoa") && parts.includes("mod") ) || (parts.includes("aoa") && parts.includes("mod"))== true) {
   
    filtered = 'AOA';
 }



//OS
 else if (parts.includes("os1") || ( parts.includes("os") && parts.includes("mod1") ) || (parts.includes("os") && parts.includes("mod") && parts.includes("1"))== true) {
    
    filtered = 'osmod1';
 }
   else if (parts.includes("os2") || ( parts.includes("os") && parts.includes("mod2") ) || (parts.includes("os") && parts.includes("mod") && parts.includes("2"))== true) {
   
    filtered = 'osmod2';
 }
 else if (parts.includes("os3") || ( parts.includes("os") && parts.includes("mod3") ) || (parts.includes("os") && parts.includes("mod") && parts.includes("3"))== true) {
   
    filtered = 'osmod3';
 }
 else if (parts.includes("os4") || ( parts.includes("os") && parts.includes("mod4") ) || (parts.includes("os") && parts.includes("mod") && parts.includes("4"))== true) {
   
    filtered = 'osmod4';
 }
 else if (parts.includes("os5") || ( parts.includes("os") && parts.includes("mod5") ) || (parts.includes("os") && parts.includes("mod") && parts.includes("5"))== true) {
   
    filtered = 'osmod5';
 }
 else if (parts.includes("os6") || ( parts.includes("os") && parts.includes("mod6") ) || (parts.includes("os") && parts.includes("mod") && parts.includes("6"))== true) {
   
    filtered = 'osmod6';
 }
   else if (parts.includes("os") || ( parts.includes("os") && parts.includes("mod") ) || (parts.includes("os") && parts.includes("mod"))== true) {
   
    filtered = 'os';
 }
 
//MP
 else if (parts.includes("mp1") || ( parts.includes("mp") && parts.includes("mod1") ) || (parts.includes("mp") && parts.includes("mod") && parts.includes("1"))== true) {
    
    filtered = 'mpmod1';
 }
   else if (parts.includes("mp2") || ( parts.includes("mp") && parts.includes("mod2") ) || (parts.includes("mp") && parts.includes("mod") && parts.includes("2"))== true) {
   
    filtered = 'mpmod2';
 }
 else if (parts.includes("mp3") || ( parts.includes("mp") && parts.includes("mod3") ) || (parts.includes("mp") && parts.includes("mod") && parts.includes("3"))== true) {
   
    filtered = 'mpmod3';
 }
 else if (parts.includes("mp4") || ( parts.includes("mp") && parts.includes("mod4") ) || (parts.includes("mp") && parts.includes("mod") && parts.includes("4"))== true) {
   
    filtered = 'mpmod4';
 }
 else if (parts.includes("mp5") || ( parts.includes("mp") && parts.includes("mod5") ) || (parts.includes("mp") && parts.includes("mod") && parts.includes("5"))== true) {
   
    filtered = 'mpmod5';
 }
 else if (parts.includes("mp6") || ( parts.includes("mp") && parts.includes("mod6") ) || (parts.includes("mp") && parts.includes("mod") && parts.includes("6"))== true) {
   
    filtered = 'mpmod6';
 }
   else if (parts.includes("mp") || ( parts.includes("mp") && parts.includes("mod") ) || (parts.includes("mp") && parts.includes("mod"))== true) {
   
    filtered = 'MP';
 }

 else if(parts.includes("time") || parts.includes("table")){
  filtered = 'timetable'
 }
 else if (parts.includes("syllabus") || parts.includes("portion")){
  filtered = 'syllabus'
 }

 else if (parts.includes("IAT") || parts.includes("time")){
  filtered = 'IAT'
 }

  else {
    //alert("VAlue not found");
    filtered = 'NULL' ;
  }
//  var lool = ["Maria" , "maria"];
//  if(parts.includes(lool) !== -1){
//    alert("Yes, the value exists!")
//    filtered = 'Maria';
//  }
  //alert(filtered);
  if(filtered != '')
  {
   load_data(filtered);
  }
  else {
      // this is where "load_data();" used to be
      $('#result').html('');
  }
});


// })
});
</script>
  </body>
</html>
