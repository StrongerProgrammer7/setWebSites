
const modal = document.querySelector('#modal');
const overloy = document.querySelector('#overlayModal');

document.addEventListener("DOMContentLoaded", ()=>
{
    console.log("DOM loaded");

    ymaps.ready(function () 
    {
    
        try 
        {
        
            let coordinate = '55.751574, 37.573856'; 
            coordinate = coordinate.split(',');
        // console.log(coordinate[0]);
            var myMap = new ymaps.Map('mymap', {
                center: [55.755864, 37.617698],
                zoom: 15
            }, {
                searchControlProvider: 'yandex#search'
            }),
            myPieChart = new ymaps.Placemark([55.755864, 37.617698], {
                balloonContent: 'Moscow'
            }, {
                preset: 'islands#icon',
                iconColor: '#0095b6'
            });
            myMap.geoObjects.add(myPieChart)

            // Создаём макет содержимого.
            MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
            );

        
        } catch (error) 
        {
            console.log(error);    
        }
    });

    let our_office = document.getElementById('our_office');
    if(our_office)
    {
        our_office.addEventListener('click',(e)=>
        {
            document.getElementById('overlayMap').classList.toggle('showOverlayMap');
            document.getElementById('address_block').classList.toggle('showAddressBlock');
            if(!e.target.classList.contains('our_office'))
                console.log(e.target.querySelector('.coordiante_address').textContent);
        });
    }

    let submenu = document.getElementById('serviceMenu');
    if(submenu)
    {
        submenu.addEventListener('click',(e)=>
        {
            submenu.querySelector('#arrowSubmenuOff').classList.toggle('arrowSubmenuOffHide');
            submenu.querySelector('#submenu').classList.toggle('submenuShow');
            submenu.querySelector('#arrowSubmenuOn').classList.toggle('submenuShow');
        });
    }
    let submenuMobile = document.getElementById('serviceMenuMobile');
    if(submenuMobile)
    {
        submenuMobile.addEventListener('click',(e)=>
        {
            submenuMobile.querySelector('#arrowSubmenuOff').classList.toggle('arrowSubmenuOffHide');
            submenuMobile.querySelector('#submenu').classList.toggle('submenuShow');
            submenuMobile.querySelector('#arrowSubmenuOn').classList.toggle('submenuShow');
        });
    }
    document.addEventListener('click',(e)=>
    {
        if(e.target.id === 'overlayModal')
        {
            modal.classList.toggle('modal_opacity');
            overloy.classList.toggle('overlayOpacity');
        }
    })
    
});

const maps = document.getElementById('countries');
const Russia = document.getElementById('circle_Russia');
const list_countries = [Russia];
if(maps)
{
    console.log("Maps get");
    maps.addEventListener("click",(e)=>
    {
       // console.log(e.target.id);
        let target = e.target.id.split('_');
       
        if(target[0] === "circle" && target[1] !== 'Russia')
        {
            if(e.target === list_countries[1])
                hideOtherElements();
            else
            {
                hideOtherElements();
                showCountry(target[1]);
                changeSizeCircle(e.target);
                list_countries.push(e.target);
                //console.log(list_countries);
                //DrawLine
            }
           
        }
    })
}

function hideOtherElements()
{
    if(list_countries.length > 1)
    {
        let elem = list_countries.pop();
       // console.log(elem.id);
        let target = elem.id.split('_');
        changeSizeCircle(elem);
        showElementSvg(`rect_${target[1]}`);
        //console.log(list_countries);
    }
}

function showCountry(country)
{
    if('China' === country)
    {
        showElementSvg('rect_China');
    
    }else if('Turkey' === country)
    {
        showElementSvg('rect_Turkey');
    }else if('India' === country)
    {
        showElementSvg('rect_India');
    }else if('Tailand' === country)
    {
        showElementSvg('rect_Tailand');
    }
}
function showElementSvg(id_rect)
{
    let country = id_rect.split('_')[1];
    let path = document.getElementById(`${country}_path`);

    let rect = document.getElementById(id_rect);
    
    rect.classList.toggle('geogMap_width117');
    path.classList.toggle('pathOpacity1');
    let text = document.getElementById(`text_${id_rect.split('_')[1]}`);
    if(text)
        setTimeout(()=>
        {
            text.classList.toggle('geogMap_text');
        },100);
    else
        createTextSVG(id_rect,rect);
}

function createTextSVG(id_rect,rect)
{
    let x = rect.getAttribute('x');
    let y = rect.getAttribute('y');

    var text = document.createElementNS('http://www.w3.org/2000/svg', 'text');
    text.id = `text_${id_rect.split('_')[1]}`;  
    let svg = document.getElementById(`${id_rect.split('_')[1]}`);
    text.setAttribute('x', Number(x)+30);
    text.setAttribute('y', Number(y)+20);
    text.setAttribute('width', 117);
    setTimeout(()=>
    {
        text.classList.add('geogMap_text');
    },100);
    text.innerHTML = `${translate(id_rect.split('_')[1])}`;

    svg.appendChild(text);
}

function translate(country)
{
    if(country==='Turkey')
        return 'Турция';
    if(country==='China')
        return 'Китай';
    if(country==='India')
        return 'Индия';
    if(country==='Tailand')
        return 'Тайланд';
}

function changeSizeCircle(circle)
{
    let rad = circle.getAttribute('r');
    if(Number(rad) === 10)
    {
        circle.setAttribute('r','14');
    }else
        circle.setAttribute('r','10');
}   


const items = document.querySelectorAll(".accordion .questions-item");
function toggleAccordion()
{
  this.classList.toggle('active');
  this.nextElementSibling.classList.toggle('active');
}
items.forEach(item => item.addEventListener('click', toggleAccordion));


function showModal()
{
    modal.classList.toggle('modal_opacity');
    overloy.classList.toggle('overlayOpacity');
    
}