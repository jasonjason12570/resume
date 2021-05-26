//　

var Today=new Date();
var birthday=new Date("1998-08-25".replace(/-/g, "\/")); 
var d=new Date(); 
var Value = d.getFullYear()-birthday.getFullYear()-((d.getMonth()<birthday.getMonth()|| d.getMonth()==birthday.getMonth() && d.getDate()<birthday.getDate())?1:0);
document.getElementById("age").innerHTML = Value;