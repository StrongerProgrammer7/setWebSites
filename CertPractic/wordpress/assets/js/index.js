// @ts-nocheck

const modal = document.querySelector('#modal');
const modalPersonal = document.querySelector('#modal_forPersonal');
const modalDeclar = document.querySelector('#modal_declarations');
const overloy = document.querySelector('#overlayModal');
var mymap;

function eventClickPeople()
{
    let people = document.querySelectorAll('#btn_human');
    people.forEach(elem =>
        {
            elem.addEventListener('click',(e)=>
            {
                let parent = elem.parentElement;
                let name = parent.querySelector('.cert_item_nameMan').textContent;
                let email = parent.querySelector('.cert_item_email').textContent.replace(/\s/g,'');
                modalPersonal.querySelector('#personal_name').value = name;
                modalPersonal.querySelector('#personal_email').value = email;
                modalPersonal.classList.toggle('modal_opacity');
                overloy.classList.toggle('overlayOpacity');
            })
        });
}

function eventClickDeclar()
{
    let declarations_for_showModal = document.querySelectorAll('#declarations');
    declarations_for_showModal.forEach(elem =>
        {
            elem.addEventListener('click',(e) =>
            {
            
                let parent = e.target.parentElement;
                let title = parent.querySelector('.cert_item-title').textContent;
                let price = parent.querySelector('.cert_item-price').textContent;
                modalDeclar.querySelector('#declar_name').value = title;
                modalDeclar.querySelector('#declar_price').value = price;
                modalDeclar.classList.toggle('modal_opacity');
                overloy.classList.toggle('overlayOpacity');
            })
        });

}

document.addEventListener("DOMContentLoaded", ()=>
{
    console.log("DOM loaded");

    ymaps.ready(function () 
    {
    
        try 
        {
        
            let coordinate = '55.751574, 37.573856'; 
            coordinate = coordinate.split(',');
            mymap = new ymaps.Map('mymap', {
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
            mymap.geoObjects.add(myPieChart)

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
            if( modal.classList.contains('modal_opacity'))
                modal.classList.toggle('modal_opacity');
            if(modalPersonal.classList.contains('modal_opacity'))
                modalPersonal.classList.toggle('modal_opacity');
            if(modalDeclar.classList.contains('modal_opacity'))
                modalDeclar.classList.toggle('modal_opacity');
            overloy.classList.toggle('overlayOpacity');
        }
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
        eventClickDeclar();
        eventClickPeople();

        let ourOfficeSetCenter = document.querySelectorAll('#ourOfficeSetCenter');
        if(ourOfficeSetCenter)
        {
            ourOfficeSetCenter.forEach(elem =>
                {
                    elem.addEventListener('click',(e) =>
                    {
                        let coordiante = e.target.querySelector('.coordiante_address');
                        let name = elem.querySelector('#ourOfficeaddressName').textContent;
                        console.log(coordiante.textContent);
                        let coors = coordiante.textContent.split(',');
                        if(mymap)
                        {
                            mymap.setCenter([coors[0],coors[1]]);
                            myPieChart = new ymaps.Placemark([coors[0],coors[1]], 
                            {
                                balloonContent: name,
                                iconCaption: name
           
                            }, {
                                preset: 'islands#icon',
                                iconColor: '#0095b6'
                            });
                            mymap.geoObjects.add(myPieChart)
                        }
                            
                    });
                });
        }
    
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
    });
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
    if(list_countries.length>1)
    {
        let select = modal.querySelector('#selectCountry').getElementsByTagName('option');
        for (let i = 0; i < select.length; i++) 
        {
            if (select[i].value === list_countries[1].id.split('_')[1]) 
                select[i].selected = true;
        }
        console.log();
    }
    modal.classList.toggle('modal_opacity');
    overloy.classList.toggle('overlayOpacity');
    
}




var pageDeclarations = 1;
var pageDeclarationsVD = 1;
var pageHumans = 1;
let countDeclaration = 3;
let countDeclarationVD = 3;
let countHuman = 1;
let declarations =  $("#btn_look_yet").data("paged");
let tpl_declaration = $('#btn_look_yet').data("tpl");


async function ajaxDeclarationsYet(button,data,idParentCatalog,currentPage)
{
    $.ajax({
        url: "/wp-admin/admin-ajax.php",
        data: data,
        type: "POST",
        success: function (data) 
        {
            if (data) 
            {
                button.html("Смотреть ещё");
                let catalog = document.querySelector(idParentCatalog);
                
                //console.log(catalog);
                var dom = $(data);
                //console.log(dom);
                let cards =[];
                for(let i =0;i<dom.length;i++)
                    cards.push(dom[i]);
                
                
                catalog.replaceChildren(...cards);
                
                button.data("paged").paged = currentPage;
                if (currentPage >= button.data("max_pages")) 
                {
                    //declarations =  button.data("paged");
                    button.hide();
                }
                eventClickPeople();
                eventClickDeclar();
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
}
jQuery(function ($) 
{
  $("#btn_look_yet").on("click", function (e) 
  {
        e.preventDefault();
        const button = $(this);


        button.html("Загрузка...");
        countDeclaration+=3;
        const data = 
        {
            "action": "load_declaration",
            "query": button.data("paged"),
            "countDeclaration" : countDeclaration,
            "tpl":  button.data("tpl"),
            "order": "DESC"
        }
        //console.log(data);
        ajaxDeclarationsYet(button,data,"#tc_content-items",++pageDeclarations);
     
  });

  $("#btn_look_yet_declaration_vd").on("click", function (e) 
  {
        e.preventDefault();
        const button = $(this);


        button.html("Загрузка...");
        countDeclarationVD+=3;
        const data = 
        {
            "action": "load_declaration",
            "query": button.data("paged"),
            "countDeclaration" : countDeclarationVD,
            "tpl":  button.data("tpl"),
            "order": "DESC"
        }
        //console.log(data);
        ajaxDeclarationsYet(button,data,"#tc_content-items-vd",++pageDeclarationsVD);
     
  });
  $("#btn_look_yet_human").on("click", function (e) 
  {
        e.preventDefault();
        const button = $(this);


        button.html("Загрузка...");
        countHuman+=1;
        const data = 
        {
            "action": "load_personal",
            "query": button.data("paged"),
            "countHuman" : countHuman,
            "tpl":  button.data("tpl"),
            "order": "DESC"
        }
        //console.log(data);
        ajaxDeclarationsYet(button,data,"#our_team-items",++pageHumans);
        
  });
  

});
