// @ts-nocheck

let modal = document.getElementById('popup');


function openPopup()
{
  modal?.classList.add('open-modal');
      
}

function closePopup()
{
    modal?.classList.remove('open-modal');

}
window.addEventListener("DOMContentLoaded",(e)=>
{
  let height = window.screen.availHeight;
  changeHeigh(height);
})
window.addEventListener("resize",(e)=>
{
  let height = window.screen.availHeight;
  console.log('width :>> ', height);
  changeHeigh(height);
})

function changeHeigh(height)
{
  if(height >1300)
  {
    document.getElementById('intro__inner').style.height = "78vh";
    document.getElementById('imgRoom').style.height = "100%";
  }else
  {
    document.getElementById('intro__inner').style.height = "100%";
    document.getElementById('imgRoom').style.height = "auto";
  }
}


const block1 = document.querySelector('.intro__right-imgRoom');
const content = document.querySelector('.content');

window.addEventListener('scroll', () => {
  const scrollTop = window.scrollY;
  block1.style.transform = `translateX(${scrollTop * 0.15}px) scale(1.3,1.2)`; // Регулировка скорости эффекта
});

