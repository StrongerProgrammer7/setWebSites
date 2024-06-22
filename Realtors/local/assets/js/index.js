// @ts-nocheck
document.addEventListener("DOMContentLoaded",function()
{
    console.log("DOM loaded");

    const swiper = new Swiper('.sample-slider', {
        loop: true,                         //loop
        pagination: {                       //pagination(dots)
            el: '.swiper-pagination',
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
        slidesPerView: 5,
        loop: true,
        loopedSlides: 3,
        initialSlide: 2,
        spaceBetween: 40,
        pagination: {
          el: '.swiper-pagination',
        },
      
        // Navigation arrows
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: 
        {
            1800: {
              slidesPerView: 4.5,
              
              spaceBetween: 40,
            },
            1550:
            {
              slidesPerView: 3.7,
              slidesPerGroup: 1,
              spaceBetween: 5,
              initialSlide: 1,
              
              
          
            },
            1350:
            {
              slidesPerView: 3.3,
              spaceBetween: 20,
              initialSlide: 1,
            },
            1100:
            {
              slidesPerView: 2.7,
              spaceBetween: 40,
              initialSlide: 1,
            },
            900:
            {
              slidesPerView: 2.2
            },
            700:
            {
              slidesPerView: 1.8
            },
            600:
            {
              slidesPerView: 1.5
            },
            500:
            {
              slidesPerView: 0.9,
              spaceBetween: 10,
            },
            400:
            {
              slidesPerView: 1,
            },
            0:
            {
              slidesPerView: 1,
            }
          
        },
          
 
      });

    const swiper_page_sale = new Swiper('.swiper-objects',
    {
     
      slidesPerView: 1,
      loop: true,
      pagination: {
        el: '.swiper-pagination',
      },
    
      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    let multiselect_block = document.querySelectorAll(".multiselect_block");
    multiselect_block.forEach(parent => {
        let label = parent.querySelector(".field_multiselect");
        let select = parent.querySelector(".field_select");
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
window.addEventListener('resize', (e)=>
{
  /*console.log(linear);
  console.log(window);
  if(window.screen.availWidth < 400)
  {
    if(linear!==undefined)
    {
      linear.setAttribute('x2','100%');
      linear.setAttribute('y2','0%');

    }
  }*/
 // showModal();
  
});

function showModal()
{
  let modal = document.getElementById("modal");
 // console.log(modal.style);
  if(window.screen.availHeight < 800 && window.screen.availWidth > 500)
    {
        modal.style.height = `${window.screen.availHeight - 40}px`;
        modal.style.top = "-5%";
        modal.style.overflow = "auto";
        document.querySelector("#modal .border").style.height = "auto";
        document.querySelector("#modal .modal-content").style.marginBottom = "-0.72rem";
        document.getElementById('modal_close_bottom').style.display = 'block';
        document.getElementById('modal_close_bottom').style.bottom = '-12px';
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
  console.log('wi :>> ', withinBoundaries);

  if(!withinBoundaries && window.getComputedStyle(document.getElementById("modal"),null).opacity === "1")
  {
    showModal();
  }
})