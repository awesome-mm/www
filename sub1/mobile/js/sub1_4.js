const tab_menu = document.querySelectorAll('.tab_menu li');
const firstList = document.querySelector('.tab_menu li:first-of-type');

const officeArea =document.querySelector('.head_office');
const yonginArea =document.querySelector('.yongin_office');

const AreaList = [officeArea,yonginArea]
console.log(officeArea)
console.log(yonginArea)
console.log(AreaList)
//첫번째를 제외하고 display none 

//첫번째 list 활성화
firstList.setAttribute('class','active');

setTimeout(function(){
  for(var i=0 ; i<AreaList.length; i++){
    AreaList[i].style.display = 'none';
  }
  AreaList[0].style.display = 'block';
},1000)

//

function tabClick (index){
  tab_menu[index].onclick = function(){
    if(tab_menu[index].getAttribute('class') != 'active'){
      for(var i=0; i<tab_menu.length; i++){
        tab_menu[i].removeAttribute('class');
      }
      for(var i=0 ; i<AreaList.length; i++){
        AreaList[i].style.display = 'none';
      }
      AreaList[index].style.display = 'block';
      tab_menu[index].setAttribute('class','active');
    }else{

    }
  };
}

//반복분으로는 속성 이외에 함수나 메소드로는 적용이 안됨으로
//closer를 이용한 함수실행
for(var i=0; i<tab_menu.length; i++){
  tabClick(i);
}

$('.tab_menu .tab').click(function(event){
  event.preventDefault();
})

// tab_menu.addEventListener("click", function(event){
//   event.preventDefault()
// });
