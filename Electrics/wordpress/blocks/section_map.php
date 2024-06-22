<section class="map">
        <div class="yaMap" style="position:relative;overflow:hidden;" id="mymap">
            
        </div>
</section>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript">
</script>
<script defer>

ymaps.ready(function () 
{
    

    try 
    {
        <? $address = get_field('addres_group','option')?>
        let coordinate = '<?echo $address['coordinate'];?>';
      
        if(!coordinate)
            coordinate = '55.751574, 37.573856'; 
        coordinate = coordinate.split(',');
        console.log(coordinate[0]);
        var myMap = new ymaps.Map('mymap', {
            center: [coordinate[0],coordinate[1]],
            zoom: 15
        }, {
            searchControlProvider: 'yandex#search'
        }),
        myPieChart = new ymaps.Placemark([coordinate[0],coordinate[1]], {
            balloonContent: '<?echo $address['address']; ?>',
            iconCaption: '<?echo $address['address'];?>'
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
</script>