var dt=new Date();
function renderdate(){

var month=document.getElementById('month');
var day=dt.getDay()+1;
var enddate=new Date(
    dt.getFullYear(),
dt.getMonth()+1,
0).getDate();
var today=new Date()
console.log(today);
var prevDate=new Date(dt.getFullYear(),dt.getMonth(),0).getDate();

document.getElementById('date_str').innerHTML=dt.toDateString();

var months=['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November','December'];

month.innerHTML=months[dt.getMonth()];

var cells="";
var cname='class="day"'
var pname='class="pday"'
var tname='class="tday"'
for(x=day;x>0;x--){
    cells+="<div "+pname+" >"+ (prevDate-x+1) +"</div>";
}
for(i=1;i<=enddate;i++){
   if(i==today.getDate() &&today.getMonth()==dt.getMonth()){
    cells+="<div "+tname+" >"+ i +"</div>";
   }
   else{
    cells+="<div "+cname+" >"+ i +"</div>";
   }
}
document.getElementsByClassName("days")[0].innerHTML=cells;

 
}

function movedate(para){
    if(para=='prev'){
        dt.setMonth(dt.getMonth()-1);
        renderdate();
    }
   else if(para=='next'){
    dt.setMonth(dt.getMonth()+1);
    renderdate();
   }
  
}