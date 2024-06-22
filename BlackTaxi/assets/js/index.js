// @ts-nocheck
/*-----------for map russia and ymap----------------*/
const svg_map = document.getElementById('svg-map');
let paths = null;
let active_path = new Map(); // 1 from 2 to
let active_path_cities = new Map(); // 1 from 2 to
let choosenTax = null;
var map_with_svg = { map:null ,id:"map"};
let map_on_the_modal = {map:null,id:"map_modal"};
let DELIVERY_TARIFF = 20;
const  MINIMUM_COST = 500;
let distance = 0;
let timePath = '';
let pricePath = 0.0;
let select_taxs = null;
/*----------tax-----------*/
let active_tax = null;
const modal = document.querySelector('#modal');
const overloy = document.querySelector('#overlayModal');
const closeModal_X = document.querySelector('#closeModal');
const modal_form_success = document.querySelector('#modal_form_success');
const modal_calc = document.querySelector('#modal_map');
const mobile_menu= document.querySelector('#mobile_menu');
const burger_menu = document.querySelector('#burger_menu');

function isSelectExists(select_cities_to,select_cities_from,select_taxs)
{
    return select_cities_to && select_cities_from && select_cities_from.length >0 && select_cities_to.length > 0 && select_taxs && select_taxs.length > 0;
}

function parentIsModal(parent,idModal,deep)
{
    if(deep !== 0 && parent)
    {
        return parentIsModal(parent.parentElement,idModal,deep - 1);
    }else if(deep === 0 && parent)
    {
        return parent.id === idModal;
    }else 
        return false;  
}

function isModalActive(modal,nameClassActive)
{   
    return modal.classList.contains(nameClassActive);
}
function deleteBorderFromSelect(select,border)
{
    if(select.classList.contains(border))
        select.classList.remove(border);
}

function addBorderToSelect(select,border)
{
    if(!select.classList.contains(border))
        select.classList.add(border);
}

document.addEventListener('DOMContentLoaded',(e) =>
{
    console.log('DOMContentLoaded');
        
    // Если карта присутствует на странице (так как есть страницы где нет)
    if(svg_map)
    {
        /*-----------------
        paths - переменная хранит все регионы которые есть на SVG map
        Все регионы необходимо записать в нее, чтобы динамически отображать на svg
        -----------------*/
        paths = svg_map.querySelectorAll('path');
        /// Код для теста, заполняет selects областями из svg
        // Если использовать, то необходим по id обратиться  к select
        
        /* let options_name_region = [];
        paths.forEach(elem =>
        {
            if(elem.getAttribute('data-title'))
            {
                //console.log(elem.getAttribute('data-title'));
                options_name_region.push(elem.getAttribute('data-title'));
            } 
        });
    
        options_name_region.forEach(region =>
        {
            let option = document.createElement('option');
            option.textContent = region;
            option.value = region;
            select_cities_to.appendChild(option);
            option = document.createElement('option');
            option.textContent = region;
            option.value = region;
        
            select_cities_from.appendChild(option);
        
        });*/
    }

    // Карта Yandex с формой selects 2 - с картой SVG & modal window
    select_taxs = document.querySelectorAll('#select_tax');
    let select_to_cities = document.querySelectorAll('#select_cities_to');
    let select_from_cities = document.querySelectorAll('#select_cities_from');
    if(isSelectExists(select_to_cities,select_from_cities,select_taxs))
    {
        event_selectCity(select_from_cities,{from:1,to:2});
        event_selectCity(select_to_cities,{from:2,to:1});
        select_taxs.forEach(select_tax =>
        {
            select_tax.disabled = true;
            select_tax.addEventListener('change',(e)=>
            {
                let value = e.target.value;
                choosenTax = value;
                //console.log(e.target.parentElement.parentElement.id);
                let isSVG_map = e.target.parentElement.parentElement.id !== "form_map_modal";
                if((active_path.get(1) && active_path.get(2)) || active_path_cities.get(1) && active_path_cities.get(2))
                {
                    if(isSVG_map === true)
                        event_selectTax(map_with_svg,isSVG_map,value);
                    else
                        event_selectTax(map_on_the_modal,isSVG_map,value);
                
                }
            });
        })
    }
        
        

    let minusPassanger = document.querySelectorAll('#minusPassanger');
    let plusPassanger = document.querySelectorAll('#plusPassanger');
    if(minusPassanger && plusPassanger && minusPassanger.length > 0 && plusPassanger.length >0)
    {   
        event_changeCountPassanger(minusPassanger,-1);
        event_changeCountPassanger(plusPassanger,1);
    }
    
    
    //THIS IS CHANGE PARKING CAR  => TODO: CHANGE CAR SLIDER = TITLE (download from server other post)
    let btns_tax_ourPark = document.querySelectorAll('#btn_tax');
    btns_tax_ourPark.forEach(elem =>
    {
        elem.addEventListener('click',(e) =>
        {
            let titleTax = document.querySelector('#ourparkingTitleTax');
            let priceTax = elem.getAttribute('data-price-tax');
            let priceTaxElem = document.querySelector('#ourParking-priceTax');
            titleTax.textContent = elem.textContent;
            priceTaxElem.textContent = priceTax + ' руб/км';
            if(active_tax!==null)
                setActiveTaxCar(active_tax);

            let parent =  elem.parentElement;
            if(parent)
            {
                active_tax = parent;
                setActiveTaxCar(parent);
            }
        });
    });

   
    resizeHeightModal(modal,690);
    resizeHeightModal(modal_calc,750);
    /*----------Swiper--------*/
    const swiper__offers = new Swiper('.swiper-carsTax', {
        // Optional parameters
        direction: 'horizontal',
        slidesPerView: 2,
        loop: true,
        loopedSlides: 3,
        initialSlide: 4,
        spaceBetween: 20,
        centeredSlides: true,
        roundLengths: true,
        // pagination: {
        //   el: '.swiper-pagination',
        //   clickable:true,
        // },
      
        // Navigation arrows
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: 
        {
            1800: {
              spaceBetween: 20,
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
            1250:
            {
                slidesPerView: 3.0,
                spaceBetween: 80,
            },
            1100:
            {
              slidesPerView: 2.7,
              spaceBetween: 20,
           
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
   const swiper__reviews = new Swiper('.swiper-reviews',
   {
    slidesPerView: 3.5,
    loopedSlides: 1,
    initialSlide: 2,
    loop: true,
    direction: 'horizontal',
    centeredSlides: true,
    roundLengths: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: 
        {
            1550: {
             
                slidesPerView: 3.5,
            },
            1300:
            {
                slidesPerView: 3.2,
            },
            1200:
            {
                slidesPerView: 2.8,
            },
            1000:
            {
                slidesPerView: 2.6,
            },
            1000:
            {
              slidesPerView: 2.2,
              spaceBetween: 20,
           
            },
            900:
            {
              slidesPerView: 2.0
            },
            700:
            {
              slidesPerView: 1.7
            },
            620:
            {
              slidesPerView: 1.5,
              spaceBetween: 60,
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
   })
});

window.addEventListener('resize',(e)=>
{
    if(svg_map && window.innerWidth <= 340)
    {
        showInputs_deletedClass('#form_map div','w10rem',3);
       
   
    }else if(window.innerWidth >= 450 && window.innerWidth <= 730)
    {
        changeElementsFormAndTitle('#form_map','.tax_title',{idmap:'map',classStart:'mapRoute-start'},{add_removeClassForm:'ml-2rem',add_removeClassTitle:'just-content-fl-start'});
       
    }
   
    resizeHeightModal(modal,690);
    resizeHeightModal(modal_calc,750);
   
});

function changeElementsFormAndTitle(id_form,class_id_title,{idmap:idmap,classStart:classStart},{add_removeClassForm:add_removeClassForm,add_removeClassTitle:add_removeClassTitle})
{
    let form = document.querySelector(id_form);
    let parent_form = form.parentElement;
    let title = parent_form.querySelector(class_id_title);
    if(document.getElementById(idmap).classList.contains(classStart))
    {
        if(form.classList.contains(add_removeClassForm) === false)
            form.classList.add(add_removeClassForm); 
        if(title.classList.contains(add_removeClassTitle) === false)
            title.classList.add(add_removeClassTitle); 
    }else
    {
        if(form.classList.contains(add_removeClassForm) === true)
            form.classList.remove(add_removeClassForm); 
        if(title.classList.contains(add_removeClassTitle) === true)
            title.classList.remove(add_removeClassTitle); 
        
    }
}

function resizeHeightModal(modal,minHeight)
{
    if(modal && window.screen.availHeight < minHeight)
    {
        if(modal.id === 'modal_map'  && window.screen.availWidth >= 810)
        {
            if(!modal.querySelector('#info_route_Modal').classList.contains('t540px'))
                modal.querySelector('#info_route_Modal').classList.add(`t540px`);
        }else if(modal.id === 'modal_map' && modal.querySelector('#info_route_Modal').classList.contains('t540px'))
                modal.querySelector('#info_route_Modal').classList.remove(`t540px`);
            
        modal.style = `height:${window.screen.availHeight - 220}px`;
    }else
    {
        if(modal.id === 'modal_map' && modal.querySelector('#info_route_Modal').classList.contains('t540px'))
                modal.querySelector('#info_route_Modal').classList.remove(`t540px`);
        modal.style = 'height:auto;'
    }
}

function setActiveTaxCar(parent)
{
    let img = parent.querySelector('.tax_car-wrapperImg');
    let star = parent.querySelector('.tax_car-wrapperStar');
    img.classList.toggle('tax_car_active');
    star.classList.toggle('tax_car_active');
    let btn = parent.querySelector('#btn_tax');
    btn.classList.toggle('tax_car_active_btn');
}

function showModal()
{
    modal.classList.toggle('modal_active');
    overloy.classList.toggle('overlayOpacity');
    
}

function showModalCalc()
{
    modal_calc.classList.toggle('modal_active');
    overloy.classList.toggle('overlayOpacity');
    if(map_on_the_modal.map === null)
        ymaps.ready(()=>
        {
            initMapDefault(map_on_the_modal);
        });

    clearSVGMapAndaction();
    if(mobile_menu.classList.contains('mobile_menu-show'))
        actionMobileMenu();
}

function clearSVGMapAndaction()
{
    active_path.forEach((val,key) =>
    {
        val.classList.remove('fillChoose');
    });
    active_path.clear();
    active_path_cities.clear();
    if(svg_map)
    {
        
        hideYMap('map','mapRoute-start');

        if(document.getElementById('info_route').classList.contains('info_route-show'))
            document.getElementById('info_route').classList.remove('info_route-show');
        showInputs_addClass('#calc_map_form_input','outOfZoneVisible');
   
        svg_map.style.display = 'flex';
        
        changeFormMapWidthScreenLess450(true);
        
        let dis = document.getElementById('btn__calc_map-disabled');
        dis.style.display = 'block';
        changeElementsFormAndTitle('#form_map','.tax_title',{idmap:'map',classStart:'mapRoute-start'},{add_removeClassForm:'ml-2rem',add_removeClassTitle:'just-content-fl-start'});

        changeShiftcalc_map_with_svg();
        choosenTax = null;
    }
}
if(overloy)
    overloy.addEventListener('click',(e)=>
    {
        closeModal();
    });

if(closeModal_X)
    closeModal_X.addEventListener('click',(e)=>
    {
        closeModal();
    });
function closeModal()
{
    if( modal.classList.contains('modal_active'))
        modal.classList.toggle('modal_active');
    if( modal_calc.classList.contains('modal_active'))
        modal_calc.classList.toggle('modal_active');
    overloy.classList.toggle('overlayOpacity');
}

burger_menu.addEventListener('click',(e)=>
{
    actionMobileMenu();
});
function actionMobileMenu()
{
    mobile_menu.classList.toggle('mobile_menu-show');
    burger_menu.classList.toggle('burger_changeColor');
}
if(modal_form_success)
{
  setTimeout(()=>
  {
    modal_form_success.classList.add('modal_form_success_displayOff');
  },3500)
}
/*------------------for map russia and yamp---------------------*/

function isCityChoosen()
{
    return active_path.size === 2 || active_path_cities.size === 2;
}

function isRepeatCity(value,num)
{
    if(active_path_cities.get(num))
    {
        let city = active_path_cities.get(num).split('_')[1].toLowerCase();
        let current_city = value.split('_')[1].toLowerCase();
        if(city === current_city)
            return true;
    }
    return false;
}

function isRepeatRegion(value,num)
{
    if(active_path.get(num))
    {
        let elem = active_path.get(num);
        
        let active_region = elem.getAttribute('data-title').toLowerCase();
        let region = value.split('_')[0].toLowerCase();
        if(active_region === region)
            return true;
    }
    return false;
}
function isRepeatLocation(value,num)
{
    //value = region_city
    if(isRepeatCity(value,num))
        return true;

    if(isRepeatRegion(value,num))
        return true;
    return false;
    
}

function showYMap(id,class_add)
{
    if(!document.getElementById(id).classList.contains(class_add))
        document.getElementById(id).classList.add(class_add);
}

function hideYMap(id,class_delete)
{
    if(document.getElementById(id).classList.contains(class_delete))
        document.getElementById(id).classList.remove(class_delete);
}
function showInputs_addClass(id,class_add,count = -1)
{
    let inputs = document.querySelectorAll(id);
    count = count === -1 ? inputs.length : count;

    for(let i =0;i<count;i++)
        if(inputs[i].classList.contains(class_add) === false)
            inputs[i].classList.add(class_add);
   
}
function showInputs_deletedClass(id,class_delete,count = -1)
{
    let inputs = document.querySelectorAll(id);
    count = count === -1 ? inputs.length : count;
    console.log(count); 
    for(let i =0;i<count;i++)
        if(inputs[i].classList.contains(class_delete) === true)
            inputs[i].classList.remove(class_delete);
 
}

function changeFormMapWidthScreenLess450(isRemove)
{
    if(window.innerWidth <= 550)
    {
        let form_map = document.querySelector('#form_map');
        //console.log(form_map,isRemove);
        if(isRemove === false)
            form_map.classList.add('ml-0');
        else
            form_map.classList.remove('ml-0');

        if(window.innerWidth < 340)
        {
            let divs = form_map.querySelectorAll('div');
            if(isRemove === false)
            {
                divs[0].classList.add('w10rem');
                divs[1].classList.add('w10rem');
                divs[2].classList.add('w10rem');
                inputs = document.querySelector('#form_map').querySelectorAll('input');
                inputs.forEach(elem =>
                {
                    elem.classList.add('w7rem');
                });
            }else
            {
                divs[0].classList.remove('w10rem');
                divs[1].classList.remove('w10rem');
                divs[2].classList.remove('w10rem');
                inputs = document.querySelector('#form_map').querySelectorAll('input');
                inputs.forEach(elem =>
                {
                    elem.classList.remove('w7rem');
                });
            }
            
        }
        
    }
}

function changeShiftcalc_map_with_svg()
{
    let calc_map_with_svg = document.querySelector('#calc_map_with_svg');
    let h2 = calc_map_with_svg.querySelector('.tax_title>h2');
    if(calc_map_with_svg.classList.contains('moveLeft'))
    {
        calc_map_with_svg.classList.remove('moveLeft');
        h2.classList.remove('m-0');
    }else
    {
        calc_map_with_svg.classList.add('moveLeft');
        h2.classList.add('m-0');
    }
}
 
/*activeSelectObj { from, to} 
* содержит from to чтобы 
* нельзя было выбрать два одинковых города
* from & to должны быть разными! (1 или 2)
*/
function event_selectCity(selects,activePathFromSelect)
{
    selects.forEach(elem =>
    {
        elem.addEventListener('change',(e)=>
        {
            if(parentIsModal(elem, "form_map_modal",2) === true) 
                actionToChoosenCity(e.target,activePathFromSelect,map_on_the_modal);
            else
                actionToChoosenCity(e.target,activePathFromSelect,map_with_svg);

            if(active_path.size === 2 || active_path_cities.size === 2)
            {
                select_taxs.forEach((selec_tax) => 
                {
                    let par_tax = selec_tax.parentElement.parentElement;
                    let elem_par = elem.parentElement.parentElement;
 
                    if(par_tax.id === elem_par.id)
                        selec_tax.disabled = false;
                    else
                        selec_tax.disabled = true;
                })
            }
        });

    })
}

function event_selectTax(map,isSVG_map,value)
{
    DELIVERY_TARIFF = Number(value);
    if(map.map!=null)
    {
        map.map.destroy();
        map.map = null;
    }
    ymaps.ready(()=> 
    {
        init(map);
                
        if(isSVG_map === true)
        {
            showYMap('map','mapRoute-start');
            showInputs_deletedClass('#calc_map_form_input','outOfZoneVisible');
            
            if(window.innerWidth >= 450 && window.innerWidth <= 730)
                changeElementsFormAndTitle('#form_map','.tax_title',{idmap:'map',classStart:'mapRoute-start'},{add_removeClassForm:'ml-2rem',add_removeClassTitle:'just-content-fl-start'});
            
            let calc_map_with_svg = document.querySelector('#calc_map_with_svg');
            if(window.innerWidth <= 780)
            {
                changeShiftcalc_map_with_svg();
                svg_map.style.display = 'none';   
                changeFormMapWidthScreenLess450(false);
                
            }else if(calc_map_with_svg.classList.contains('moveLeft'))
            {
                changeShiftcalc_map_with_svg();
            }
            if(document.getElementById('info_route') && document.getElementById('info_route').classList.contains('info_route-show')=== false)
                fillInfoRoute('info_route',false);

            let dis = document.getElementById('btn__calc_map-disabled');
                dis.style.display = 'none';
        }else
            fillInfoRoute('info_route_Modal',true);
        
    });

}
function setTextInfoRout()
{
    
    let id = 'info_route';
    if(modal_calc.classList.contains('modal_active'))
        id = 'info_route_Modal';
    let elem =  document.getElementById(id);
    setContentParagraph(elem,'#pDistanse',distance.text);
    setContentParagraph(elem,'#pTimePath',timePath.text);
    setContentParagraph(elem,'#pPricePath',pricePath + 'р');
}

function setContentParagraph(parent,id_info_route,text)
{
    let pInfo =parent.querySelector(id_info_route);
    pInfo.textContent = text;
}
function fillInfoRoute(id,isModalActive)
{   
    
    let elem =  document.getElementById(id);
    if(isModalActive === false)
        elem.classList.add('info_route-show');

    if(elem.querySelector('#pDistanse'))
        return;

    createParagraphInfoRoute(elem,'#distanse',distance.text,'pDistanse');
    createParagraphInfoRoute(elem,'#timePath',timePath.text,'pTimePath');
    createParagraphInfoRoute(elem,'#pricePath',pricePath + 'р','pPricePath');
}

function createParagraphInfoRoute(parent_block,id_parent_info_route,text,id)
{
    let p = parent_block.querySelector(id_parent_info_route);
    let child = document.createElement('p');
    child.textContent = text;
    child.id = id;
    p.appendChild(child);
}

function event_changeCountPassanger(operationElems,op)
{
    operationElems.forEach((elem) =>
    {
        elem.addEventListener('click', (e) =>
        {
            changeCountPassanger(op,elem.parentElement);
        });
    });
}
function changeCountPassanger(op,parent)
{
    let value = parent.querySelector('#countPassanger').value;
    parent.querySelector('#countPassanger').value = Math.max(1,Number(value) + op);
}


function actionToChoosenCity(elem,{from:from_num, to:to_num},map)
{
    let value = elem.value;
    
    if(isRepeatLocation(value,from_num)===false)
    {
        deleteBorderFromSelect(elem,'border_red');
        addBorderToSelect(elem,'border_ECCE00');
        if(isModalActive(document.getElementById('modal_map'),'modal_active') === false)
            showRegionOnTheSVG(value,to_num);
        else
            active_path_cities.set(to_num,value);
        initMapNewRoute(map);
    }else
    {
        deleteBorderFromSelect(elem,'border_ECCE00');
        addBorderToSelect(elem,'border_red');
    }        
}


function initMapNewRoute(map)
{
    if(isCityChoosen() && choosenTax !== null)
    {
        if(map.map!=null)
        {
            map.map.destroy();
            map.map = null;
            ymaps.ready(()=>
            {
                init(map);
            });
        }
    }
}


function showRegionOnTheSVG(selected,num)
{
    
    let selected_region = selected.split('_')[0].toLowerCase();
    paths.forEach(elem =>
    {
        if(elem.getAttribute('data-title') && elem.getAttribute('data-title').toLowerCase() === selected_region)
        {
            elem.classList.add('fillChoose');
            if(active_path.get(num))
            {
                let reg = active_path.get(num);
                reg.classList.remove('fillChoose');
            }
            active_path.set(num,elem);
            active_path_cities.set(num,selected);
            return;
        }
    });
}

function initMapDefault(map)
{
    createMap(map,[53.906882, 30.067233],6,[]);
    var  zoomControl = createZoomControl('small','none',{
        bottom: 145,
        right: 10
    });
    map.map.controls.add(zoomControl);
}

function init(map) 
{
    createMap(map,[60.906882, 30.067233],2,[]);
    // Создадим панель маршрутизации.
       
    var  zoomControl = createZoomControl('small','none',{
        bottom: 145,
        right: 10
    });
    
    let cityFrom = active_path_cities.get(2).split('_').join(' ');
    let cityTo = active_path_cities.get(1).split('_').join(' ');
    // setRoute(ymaps,map,MINIMUM_COST,active_path.get(2).getAttribute('data-title'),active_path.get(1).getAttribute('data-title'));
    setRoute(ymaps,map,cityFrom,cityTo);
    map.map.controls.add(zoomControl);
    
}
function createMap(map,center,zoom,controls)
{
    map.map = new ymaps.Map(map.id, 
    {
        center: center,
        zoom: zoom,
        controls: controls
    });
}
function createZoomControl(size,float,position)
{
    return new ymaps.control.ZoomControl({
        options: {
            size: size,
            float: float,
            position: position
        }
    });
}
function changePlacemarket(ymaps,route,num)
{
    let yandexWayPoint = route.getWayPoints().get(num);
    // Создаем балун у метки второй точки.
    ymaps.geoObject.addon.balloon.get(yandexWayPoint);
    yandexWayPoint.options.set({
        preset: "islands#icon",iconColor: '#0095b6',
        iconContentLayout: ymaps.templateLayoutFactory.createClass(
            `${num+1}`
        ),
       
    });
}

function setRoute(ymaps,map,from,to)
{
    var routePanelControl = new ymaps.control.RoutePanel({
        options: {
            // Добавим заголовок панели.
            showHeader: true,
            title: 'Расчёт'
        }
    });
        // Пользователь сможет построить только автомобильный маршрут.
        routePanelControl.routePanel.options.set({
            types: {auto: true}
        });
    routePanelControl.routePanel.state.set({
        fromEnabled: false,
        from: from,
        toEnabled: false,
        to: to
     });
    // console.log(from,to);
    // Получим ссылку на маршрут.
    routePanelControl.routePanel.getRouteAsync().then(function (route) 
    {

        // Зададим максимально допустимое число маршрутов, возвращаемых мультимаршрутизатором.
        route.model.setParams({results: 1}, true);

        // Повесим обработчик на событие построения маршрута.
        route.model.events.add('requestsuccess', function () 
        {
            
            changePlacemarket(ymaps,route,0);
            changePlacemarket(ymaps,route,1);
            var activeRoute = route.getActiveRoute();
            if (activeRoute) 
            {
                
                // Получим протяженность маршрута.
                var length = route.getActiveRoute().properties.get("distance"),
                   time =  route.getActiveRoute().properties.get("duration"),
                // Вычислим стоимость доставки.
                    price = calculate(Math.round(length.value / 1000)),
                // Создадим макет содержимого балуна маршрута.
                    balloonContentLayout = ymaps.templateLayoutFactory.createClass(
                        '<span>Расстояние: ' + length.text + '.</span><br/>' +
                        '<span style="font-weight: bold; font-style: italic">Стоимость: ' + price + ' р.</span><br/>' +
                        '<span>' + time.text + '</span>');
                // Зададим этот макет для содержимого балуна.
                route.options.set('routeBalloonContentLayout', balloonContentLayout);
                // Откроем балун.
                //activeRoute.balloon.open();
                distance = length;
                timePath = time;
                pricePath = price;
                setTextInfoRout();
            }
        });

    });
    // Функция, вычисляющая стоимость доставки.
    function calculate(routeLength) 
    {
        return Math.max(routeLength * DELIVERY_TARIFF, MINIMUM_COST);
    }

    map.map.controls.add(routePanelControl);
}
/*------------------end yamp -------------------------------*/