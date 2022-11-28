const subMenuBtn= document.querySelector('.menu_open_btn');
const subMenuList = document.querySelector('#content .sub_menu ul');
const subMenuIcon = document.querySelector('#content #sub_menu_icon')
const subMenuNotice = document.querySelector('#content .notice')

//메뉴버튼을 클릭하면
subMenuBtn.onclick = function (e){
  e.preventDefault()

  //메뉴리스트를 보이게
  subMenuList.classList.toggle('menu_open')

  if(subMenuList.classList.length){//menu_open클래스가 있다면 true
    subMenuIcon.setAttribute('class','fa-solid fa-minus')
    subMenuNotice.innerText = '닫기'
  }else{
    subMenuIcon.setAttribute('class','fa-solid fa-plus')
    subMenuNotice.innerText = '열기'
  }


}