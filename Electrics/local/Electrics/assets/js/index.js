// @ts-nocheck
const form_modal = document.querySelector('#form_modal');
const modal = document.querySelector('#modal');
const overloy = document.querySelector('#overlayModal');
const form_requst = document.querySelector('#form_requst');
const questions_form = document.querySelector('#questions_form');
document.addEventListener("DOMContentLoaded", () =>
{
    console.log("DOM Loaded");

    let btn_order_serivec = document.querySelectorAll('#orderService');
    btn_order_serivec.forEach(elem =>
    {
        elem.addEventListener('mouseenter', (e) =>
        {

            let card = elem.parentElement.parentElement.parentElement;
            // console.log(card);
            if (card.classList.contains('services__card'))
            {

                let parent = card.querySelector('.services__card-content');

                if (parent !== null)
                {
                    //console.log(parent);
                    let child = parent.querySelector('#wrapper__info_card')
                    if (child !== null)
                    {
                        //console.log(child);
                        child.classList.add('changeColorHoverCard');
                        card.classList.add('changeBackHoveCard');
                        let p = child.querySelector('.services__card-info');
                        p.classList.add('changeTextHoverCard');

                        e.target.classList.add("changeColorHoverCard");
                    }

                }

            }

        })

        elem.addEventListener('mouseleave', (e) =>
        {

            let card = elem.parentElement.parentElement.parentElement;
            if (card)
            {
                let parent = e.fromElement;
                parent = parent.parentElement;

                if (parent !== null)
                {
                    let child = parent.querySelector('#wrapper__info_card');
                    if (child)
                    {
                        child.classList.remove('changeColorHoverCard');
                        card.classList.remove('changeBackHoveCard');
                        let p = child.querySelector('.services__card-info');
                        p.classList.remove('changeTextHoverCard');
                        e.target.classList.remove("changeColorHoverCard");
                    }
                }
            }




        })
    });

    document.querySelector('.burger').addEventListener('click', function ()
    {
        document.querySelector('.burger span').classList.toggle('active');
        document.querySelector('.menu_mobail').classList.toggle("animate2");
        document.querySelector('.menu_mobail').classList.toggle("animate");
    });

    document.addEventListener('click', (e) =>
    {
        if (e.target.id === 'overlayModal')
        {
            modal.classList.toggle('modal_opacity');
            overloy.classList.toggle('overlayOpacity');
        }
    })



});


function showModal()
{
    modal.classList.toggle('modal_opacity');
    overloy.classList.toggle('overlayOpacity');

}

async function sendAjax(body)
{
    try 
    {
        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            data: body,
            type: "POST",
            success: function (data) 
            {
                console.log(data);
                alert('Данные успешно отправлены ждите звонка!');
            },
            error: function (err)
            {
                console.log(err);
                alert('Проблемы с отправкой данных на сервере.')
            }
        });

    } catch (error) 
    {
        console.log(error);
    }
}


const modal_form_success = document.querySelector('#modal_form_success');
if (modal_form_success)
{
    setTimeout(() =>
    {
        modal_form_success.classList.add('modal_form_success_displayOff');
    }, 3500)
}
