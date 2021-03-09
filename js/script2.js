const controls2=document.querySelector(".controls2");
const container2=document.querySelector(".thumbnail-container2");
const allBox2=container2.children;
const containerWidth2=container2.offsetWidth;
const margin2=30;
 var items2=0;
 var totalItems2=0;
 var jumpSlideWidth2=0;


// item setup per slide

responsive2=[
{breakPoint2:{width2:0,item2:1}}, //if width greater than 0 (1 item will show)
{breakPoint2:{width2:600,item2:2}}, //if width greater than 600 (2  item will show)
{breakPoint2:{width2:1000,item2:4}} //if width greater than 1000 (4 item will show)
]

function load2(){
   for(let i=0; i<responsive2.length;i++){
      if(window.innerWidth>responsive2[i].breakPoint2.width2){
          items2=responsive2[i].breakPoint2.item2
      }
   }
   start2();
}

function start2(){
   var totalItemsWidth2=0
  for(let i=0;i<allBox2.length;i++){
       // width and margin setup of items
      allBox2[i].style.width=(containerWidth2/items2)-margin + "px";
      allBox2[i].style.margin=(margin2/2)+ "px";
      totalItemsWidth2+=containerWidth2/items2;
      totalItems2++;
  }

  // thumbnail-container width set up
  container2.style.width=totalItemsWidth2 + "px";

  // slides controls number set up
   const allSlides2=Math.ceil(totalItems2/items2);
   const ul2=document.createElement("ul");
      for(let i=1;i<=allSlides2;i++){
        const li2=document.createElement("li");
             li2.id=i;
             li2.innerHTML=i;
             li2.setAttribute("onclick","controlSlides2(this)");
             ul2.appendChild(li2);
             if(i==1){
              li2.className="active2";
             }
      }
      controls2.appendChild(ul2);
}

  // when click on numbers slide to next slide
function controlSlides2(ele){
     // select controls children  'ul' element
     const ul2=controls2.children;

     // select ul children 'li' elements;
    const li2=ul2[0].children


     var active2;

     for(let i=0;i<li2.length;i++){
      if(li2[i].className=="active2"){
          // find who is now active
          active2=i;
          // remove active class from all 'li' elements
          li2[i].className="";
      }
     }
     // add active class to current slide
     ele.className="active2";

     var numb2=(ele.id-1)-active2;
        jumpSlideWidth2=jumpSlideWidth2+(containerWidth2*numb2);
     container2.style.marginLeft=-jumpSlideWidth2 + "px";
}

window.onload=load2();
