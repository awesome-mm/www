$(document).ready(function(){
  var listDate = new XMLHttpRequest();

  listDate.onload = function(){

    if(listDate.status == 200){
      productList = JSON.parse(listDate.responseText);
  
    var Elementlist = '';//태그를 넣어둘 곳
      Elementlist +='<ul>';
      for(i=0; i<productList.list.length; i++){
        Elementlist +='<li>';
        Elementlist +='<img src="'+productList.list[i].img+'" alt="제품사진" />';
        Elementlist +='<div class="content_text'+[i+1]+'">';
        Elementlist +='<h4>'+ productList.list[i].title +'</h4>';
        Elementlist +='<p>'+productList.list[i].text+'</p>';
        Elementlist +='</div>';
        Elementlist +='</li>';
      }
      Elementlist +='</ul>';
  
      document.querySelector('.product_list').innerHTML = Elementlist;
  console.log(productList.list);

    }
  }


  


  listDate.open('get','./data/sub1_3.json',true);
  listDate.send(null);

});

