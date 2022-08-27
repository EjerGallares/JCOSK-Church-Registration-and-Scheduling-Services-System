let date = new Date();
let hours = date.getHours();
let greetings;

if(hours > 18)
greetings= "Good Evening";
else if(hours>12)
greetings= "Good Afternoon";
else if(hours>0)
greetings= "Good Morning";
else
greetings= "Hello!";
document.write("<h2>" +greetings + "</h2>");