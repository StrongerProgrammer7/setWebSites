// @ts-nocheck
let filters = {};
let swiper_page_sale;

function getSelectValues(select) 
      {
        var result = [];
        var options = select && select.options;
        var opt;
        for (var i=0, iLen=options.length; i<iLen; i++) {
          opt = options[i];
          if (opt.selected) {
            result.push(opt.value || opt.text);
          }
        }
        return result;
      }

document.addEventListener("DOMContentLoaded",function()
{
    console.log("DOM loaded");

    const swiper = new Swiper('.sample-slider', {
        loop: true,                         //loop
        pagination: {                       //pagination(dots)
            el: '.swiper-pagination',
            clickable:true,
            /*renderBullet: function (index,className)
            {
                return '<span class="dot ' + className + '"</span>';
            }*/
        },
        navigation: {                       //navigation(arrows)
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    const swiper_rentRoom = new Swiper('.swiper_rentRoom', {
      loop: true,                         //loop
      pagination: {                       //pagination(dots)
          el: '.swiper-pagination',
          clickable:true,
          /*renderBullet: function (index,className)
          {
              return '<span class="dot ' + className + '"</span>';
          }*/
      },
      navigation: {                       //navigation(arrows)
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
      },
  });
    const swiper__offers = new Swiper('.swiper-room', {
        // Optional parameters
        direction: 'horizontal',
        slidesPerView: 2,
        loop: true,
        loopedSlides: 3,
        initialSlide: 4,
        spaceBetween: 40,
        centeredSlides: true,
        roundLengths: true,
        pagination: {
          el: '.swiper-pagination',
          clickable:true,
        },
      
        // Navigation arrows
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: 
        {
            1800: {
              spaceBetween: 200,
              slidesPerView: 4.5,
            },
            1600:
            {
              slidesPerView: 4,

              spaceBetween: 120,
              
          
            },
            1430:
            {
              slidesPerView: 3.5,
              spaceBetween: 80,

            },
            1100:
            {
              slidesPerView: 2.7,
              spaceBetween: 40,
           
            },
            900:
            {
              slidesPerView: 2.2
            },
            700:
            {
              slidesPerView: 1.8
            },
            620:
            {
              slidesPerView: 1.5
            },
            550:
            {
              slidesPerView: 1.4,
              spaceBetween: 40,
            },
            500:
            {
              slidesPerView: 1.3,
            },
            450:
            {
              slidesPerView:1.2,
            },
            400:
            {
              slidesPerView:1.1,
            },
            350:
            {
              slidesPerView: 1,
            },
            0:
            {
              slidesPerView: 1,
            }
          
        },
          
 
      });

    swiper_page_sale = new Swiper('.swiper-objects',
    {
     
      slidesPerView: 1,
      loop: true,
      centeredSlides: true,
        roundLengths: true,
      pagination: {
        el: '.swiper-pagination',
        clickable:true,
      },
    
      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: 
        {
          1300:
          {
            slidesPerView: 1,
          },
            0:
            {
              slidesPerView: 0.9,
            }
          
        },
    });

    let multiselect_block = document.querySelectorAll(".multiselect_block");
    multiselect_block.forEach(parent => 
    {
        let label = parent.querySelector(".field_multiselect");
        let select = parent.querySelector(".field_select");
 
        
        let options = [...select];
       
        options.forEach(element => {
         // console.log([...element.attributes]);
            if([...element.attributes].length > 1)
            {
              label.textContent ="";
              label.append("Выбрано (" + 1 + ")")
              return;
            }

        });
        let text = label.innerHTML;
        select.addEventListener("change", function(element) {
            let selectedOptions = this.selectedOptions;
         
            label.innerHTML = "";
            label.append("Выбрано (" + selectedOptions.length + ")")
        })
    });

    let multiselect_block2 = document.querySelectorAll(".multiselect_block_character");
    multiselect_block2.forEach(parent => {
        let label = parent.querySelector(".field_multiselect_character");
        let select = parent.querySelector(".field_select_character");
        let text = label.innerHTML;
        select.addEventListener("change", function(element) {
            let selectedOptions = this.selectedOptions;
         
            label.innerHTML = "";
            label.append("Выбрано (" + selectedOptions.length + ")")
        })
    });

  
  let countSliders = document.querySelectorAll('#slide').length;
  //console.log(`#slide [aria-label="${countSliders-1}"]`);
  //let elem = document.querySelectorAll(`#slide`);
  //elem[countSliders-1].remove();
  document.querySelector('.burger').addEventListener('click', function()
  {
    document.querySelector('.burger span').classList.toggle('active');
    document.querySelector('.menu').classList.toggle("animate");
  });
  
  
  /*let linear = document.querySelectorAll("#paint0_linear_7_956");
  if(window.screen.availWidth < 400)
    {
      if(linear!==undefined)
      {
        for(let i =0;i<linear.length;i++)
          linear[i].setAttribute('y2','0%');

      }
    }*/
    
    document.getElementById('modal_close_bottom').style.display = 'none';
    

});


let sub = document.getElementById('link__submenu');
let submenu = document.getElementById('submenu');
sub.addEventListener('mouseover',(e)=>
{ 
    submenu.style = "display:block;";
});
submenu.addEventListener('mouseout', (e) =>
{
  submenu.style="display:none";
});


let sub_footer = document.getElementById('link__submenu_footer');
let submenu_footer = document.getElementById('submenu_footer');
sub_footer.addEventListener('mouseover',(e)=>
{ 
  submenu_footer.style = "display:block;";
});
submenu_footer.addEventListener('mouseout', (e) =>
{
  submenu_footer.style="display:none";
});


document.addEventListener('mouseover' ,(e) =>
{
  if(e.target.id == "submenu_span")
  {
    let arrSubs = document.querySelectorAll('#submenu_links');
    arrSubs.forEach(elem =>
      {
        elem.style = "display:none;";
      });

    let subMenu = e.toElement;
    let parent = subMenu.parentElement;
    if(parent)
    {
      let subLinks = parent.querySelector('.submenu_links');

     
      subLinks.style = "display:block;";
    }
   
  }


  if(e.target.id === "submenu")
  {
    let arrs = document.querySelectorAll('.submenu_links');
    arrs.forEach(elem =>
      {
        elem.style = "display:none;";
      });
  }

  //Foooter
  if(e.target.id == "submenu_span_footer")
  {
    let arrSubs = document.querySelectorAll('#submenu_links_footer');
    arrSubs.forEach(elem =>
      {
        elem.style = "display:none;";
      });

    let subMenu = e.toElement;
    let parent = subMenu.parentElement;
    if(parent)
    {
      let subLinks = parent.querySelector('.submenu_links');

     
      subLinks.style = "display:block;";
    }
   
  }

  
  if(e.target.id === "submenu_footer")
  {
    let arrs = document.querySelectorAll('.submenu_links_footer');
    arrs.forEach(elem =>
      {
        elem.style = "display:none;";
      });
  }

});


window.addEventListener('resize', (e)=>
{
  /*console.log(linear);
  console.log(window);*/
  if(window.screen.availWidth < 1800)
  {
    //swiper_page_sale.update();
    swiper_page_sale.init();
   /* if(linear!==undefined)
    {
      linear.setAttribute('x2','100%');
      linear.setAttribute('y2','0%');

    }*/
  }

  
});

function redirectToCatalogSell()
{
  window.location ="https://rieltors.dev.agrachoff.ru/sample-page/prodazha";
}

function redirectToCatalogRent()
{
  window.location ="https://rieltors.dev.agrachoff.ru/sample-page/arenda";
}

function redirectToAboutCompany()
{
  window.location = "https://rieltors.dev.agrachoff.ru/sample-page/o-kompanii";
}
function showModal()
{
  let modal = document.getElementById("modal");
  //console.log(window.screen.availHeight);
  
  if(window.screen.availHeight < 800 && (window.screen.availWidth > 300 && window.screen.availWidth < 800))
    {
        modal.style.height = `${window.screen.availHeight - 40}px`;
        modal.style.top = "-5%";
        modal.style.overflow = "auto";
        document.querySelector("#modal .border").style.height = "auto";
        document.querySelector("#modal .modal-content").style.marginBottom = "-0.72rem";
        document.getElementById('modal_close_bottom').style.display = 'block';
        document.getElementById('modal_close_bottom').style.bottom = '-5px';
        document.getElementById('modal_close_bottom').style.top = 'initial';
        document.getElementById('modal_close_bottom').style.left = '-6px';
        
        
    }else if(modal.style.height && modal.style.height !== "")
    {
      modal.style.removeProperty("height");
      modal.style.removeProperty("top");
      modal.style.removeProperty("zoom");
      document.querySelector("#modal .modal-content").style.removeProperty("margin-bottom");
      document.querySelector("#modal .border").style.removeProperty("height");
      document.getElementById('modal_close_bottom').style.display = 'none';
    }

 
  if(modal.classList.contains('block_modal_display_block'))
  {
    modal.classList.remove('block_modal_display_block');
  }else
    modal.classList.add('block_modal_display_block');
}

document.addEventListener('click',(e)=>
{
  const withinBoundaries = e.composedPath().includes(document.querySelector('#modal'));
  //console.log('wi :>> ', withinBoundaries);

  if(!withinBoundaries && window.getComputedStyle(document.getElementById("modal"),null).opacity === "1")
  {
    showModal();
  }
})


const formSortByPrice = document.querySelector("#formSortByPrice");
const select = document.querySelector("#selectByPrice");
const form_modal = document.querySelector('#modal_form');

// form_modal.addEventListener('submit',async (e) =>
// {
//   e.preventDefault();
//   const formField = e.target.elements;
//   const chekced = formField.policy.value;
//   if(chekced)
//   {
//     const body =
//     {
//       "action": "from_modal",
//       "name":formField.name.value,
//       "phone":formField.phone.value,
//       "modal_typeService": getSelectValues(formField.modal_typeService),
//       "modal_typeObject": getSelectValues(formField.modal_typeObject),
//       "address":formField.address.value,
//       "square":formField.square.value,
//       "countRoom":formField.countRoom.value,
//     };
//     console.log(body);

//     try 
//     {
//         $.ajax({
//           url: "/wp-admin/admin-ajax.php",
//           data: body,
//           type: "POST",
//           success: function (data) 
//           {
//               console.log(data);
//               window.location = 'http://rieltors.dev.agrachoff.ru/sample-page/o-kompanii';
//           },
//           error: function(err)
//           {
//             console.log(err);
//           }
//         });

//     } catch (error) 
//     {
//         console.log(error);
//     }

    
//   }else
//   {
//     const block_check = document.querySelector('.modal_form_personalInfo');
//     block_check.classList.add('backRed');
//     setTimeout(()=>
//     {
//       block_check.classList.remove('backRed');
//     }, 3000);

//   }
  
// });


let submit_btn_call_us;
function getSubmitValueBtn(button)
{
  submit_btn_call_us = button.id;
}




var currentPage = 1;
var selectOrder = "ASC";
let cardsQuery =  $("#btnAddCards").data("paged");
let tplCards = $('#btnAddCards').data("tpl");
let currentPagePhot = 1;
let photosQuery = $("#getYetPhotoObjects").data("paged");
let tplPhots = $("#getYetPhotoObjects").data("tpl");
if(cardsQuery === undefined)
  cardsQuery = $("#nothind_data_card").data("paged");
if(tplCards === undefined)
  tplCards = $('#nothind_data_card').data("tpl");
if(photosQuery === undefined)
    photosQuery = $("#nothind_data_photObjects").data("paged");
if(tplPhots === undefined)
    tplPhots = $('#nothind_data_photObjects').data("tpl");

const buttonGiveAgain = $('#btnAddCards');
jQuery(function ($) 
{
  $("#btnAddCards").on("click", function (e) 
  {
      e.preventDefault();
      const button = $(this);

      //Костыль
      cardsQuery =  $("#btnAddCards").data("paged");
      tplCards = $('#btnAddCards').data("tpl");
      button.html("Загрузка...");

      const data = 
      {
          "action": "load_more",
          "query": button.data("paged"),
          "page":  currentPage,
          "tpl":  button.data("tpl"),
          "order": select.value,
          filters: filters
      }
     // console.log(data);
      //console.log(button.data("max_pages"));
      $.ajax({
          url: "/wp-admin/admin-ajax.php",
          data: data,
          type: "POST",
          success: function (data) 
          {
              if (data) 
              {
                  button.html("Смотреть ещё");
                  let catalog = document.querySelector("#catalog__content");
                  
                  
                  var dom = $(data);
                 // console.log(dom);
                  let cards =[];
                  for(let i =0;i<dom.length;i++)
                  {
                      if(i%2==0)
                      cards.push(dom[i]);
                  }
        
                  catalog.replaceChildren(...cards);
                  currentPage++;
                  if (currentPage >= button.data("max_pages")) 
                  {
                      cardsQuery =  button.data("paged")
                      button.hide();
                  }
              } else 
              {
                  button.hide();
              }
          },
          error: function(err)
          {
            console.log(err);
          }
      });
  });
  $('#selectByPrice').on("change", (e) =>
  {
    selectOrder = select.value;
    let cards = [...document.querySelectorAll("#catalog__content #cards")];

    cards.sort((a,b) =>
    {
      //console.log(a);
      //console.log(b);
      let textA = a.querySelector('#price_text').textContent;
      let textB = b.querySelector('#price_text').textContent;
      var numberPattern = /\d+/g;
      textA = textA.match( numberPattern )[0];
      textB = textB.match( numberPattern )[0];


      a = Number(textA);
      b = Number(textB);
      if(select.value === "ASC")
      {
        if(a<b) return -1;
        if(b<a) return 1;
        return 0;
      }else
      {
        
        if(a<b) return 1;
        if(b<a) return -1;
        return 0;
      }
      
    })
    const outputHtml = cards.reduce((a, el) => a + el.outerHTML, "");
   
    document.querySelector("#catalog__content").innerHTML = outputHtml;;
   ;
    // const data = 
    //   {
    //       "action": "sort_posts",
    //       "query": $('#btnAddCards').data("paged"),
    //       "page":  countPosts,
    //       "tpl":  $('#btnAddCards').data("tpl"),
    //       "order": select.value
    //   }
    //   $.ajax({
    //       url: "/wp-admin/admin-ajax.php",
    //       data: data,
    //       type: "POST",
    //       success: function (data) 
    //       {
    //           if (data) 
    //           {
    //               let catalog = document.querySelector("#catalog__content");
                  
    //               var dom = $(data);
    //               let cards =[];
    //               for(let i =0;i<dom.length;i++)
    //               {
    //                   if(i%2==0)
    //                   cards.push(dom[i]);
    //               }
        
    //               catalog.replaceChildren(...cards);
    //           }
    //       },
    //       error: function(err)
    //       {
    //         console.log(err);
    //       }
    //   });
  });
  $("#filters").on("submit", async function (e) 
  {
      e.preventDefault();

      
      filters = 
      {
        typeObjectSelect: getSelectValues(typeObjectSelect),
        from_price: from_price.value,
        to_price: to_price.value,
        from_square: from_square.value,
        to_square: to_square.value,
        count_room:$("input[type='radio'][name='count_bed']:checked").val(),
        count_bed: $("input[type='radio'][name='count_room']:checked").val(),
        repairSelect: repairSelect.value,
        charactersSelect: getSelectValues(charactersSelect),

      }
     // console.log(filters);

      const dataForPosts = 
      {
          "action": "filter_posts",
          "query": cardsQuery,
          "page":  currentPage,
          "tpl":  tplCards,
          "order": select.value,
          filters: filters
      }
      //console.log(dataForPosts);
      //console.log(button.data("max_pages"));
      await $.ajax({
          url: "/wp-admin/admin-ajax.php",
          data: dataForPosts,
          type: "POST",
          success: function (data) 
          {
              if (data) 
              {
                  let catalog = document.querySelector("#catalog__content");
                  
                  
                  var dom = $(data);
                  //console.log(dom);
                  let cards =[];
                  for(let i =0;i<dom.length;i++)
                  {
                      if(i%2==0)
                      cards.push(dom[i]);
                  }
        
                  catalog.replaceChildren(...cards); 
                  //console.log($('#btnAddCards')[0].hidden);  
                  if($('#btnAddCards')[0] && $('#btnAddCards')[0].hidden === false)
                  {
                    $('#btnAddCards').show();
                  }         
              }else
              {
                let catalog = document.querySelector("#catalog__content");
                let nothing = document.createElement('h1');
                nothing.textContent = " Отсутствует";
                nothing.style = "margin-top:0 auto;";
                nothing.classList.add('offers_card');
                catalog.replaceChildren();
                catalog.append(nothing);
                $('#btnAddCards').hide();
              }
          },
          error: function(err)
          {
            console.log(err);
          }
      });
  });


  $("#getYetPhotoObjects").on("click", function (e) 
  {
      e.preventDefault();
      const button = $(this);
      console.log(button);
      //Костыль
      photosQuery =  $("#getYetPhotoObjects").data("paged");
      tplPhots = $('#getYetPhotoObjects').data("tpl");
      button.html("Загрузка...");

      const data = 
      {
          "action": "load_photos",
          "query": button.data("paged"),
          "page":  currentPagePhot,
          "tpl":  button.data("tpl"),
      }
     // console.log(data);
      //console.log(button.data("max_pages"));
      $.ajax({
          url: "/wp-admin/admin-ajax.php",
          data: data,
          type: "POST",
          success: function (data) 
          {
              if (data) 
              {
                  button.html("Смотреть ещё");
                  let catalog = document.querySelector("#swiper_content_photoObjects");
                  
                  
                  var content = $(data);
                 // console.log(dom);
                  let blocks =[];
                  for(let i =0;i<content.length;i++)
                  {
                      if(i%2==0)
                      blocks.push(content[i]);
                  }
        
                  catalog.replaceChildren(...blocks);
                  console.log(swiper_page_sale);
                  swiper_page_sale.update();
                  swiper_page_sale.disable();
                  swiper_page_sale.enable();
                  currentPagePhot++;
                  if (currentPagePhot >= button.data("max_pages")) 
                  {
                      photosQuery =  button.data("paged")
                      button.hide();
                  }
              } else 
              {
                  button.hide();
              }
          },
          error: function(err)
          {
            console.log(err);
          }
      });
  });


});

