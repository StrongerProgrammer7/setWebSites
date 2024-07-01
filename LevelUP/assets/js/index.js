// @ts-nocheck

function displayClue(e, display)
{
    const parent = e.target.parentElement;
    const clue = parent?.children[1];
    clue.style.display = display;
}

function addEventDisplayClueInputs(id)
{
    const input = document.getElementById(id);
    input.addEventListener('focusin', (e) =>
    {
        displayClue(e, 'flex');
    });

    input.addEventListener('focusout', (e) =>
    {
        displayClue(e, 'none');
    });
}

function onlyDigit(e)
{
    const value = e.target.value;
    const reg = /[^0-9\+]/g;

    e.target.value = value.replace(reg, '');
}

function onlyletter(e)
{
    const value = e.target.value;
    const reg = /[^a-zA-Z А-Яа-яёЁ]/g;
    e.target.value = value.replace(reg, '');
}


function startTimer(time, timerElement)
{
    let minutes, seconds;

    const countdown = setInterval(() =>
    {
        minutes = Math.floor(time / 60);
        seconds = time % 60;

        seconds = seconds < 10 ? '0' + seconds : seconds;
        timerElement.textContent = `${ minutes }:${ seconds }`;

        if (--time < 0)
        {
            clearInterval(countdown);
            timerElement.textContent = "TIME'S UP!";
        }
    }, 1000);
}

document.addEventListener('DOMContentLoaded', () =>
{
    console.log('DomContentLoaded');

    $('#myslider').slick(
        {
            centerMode: true,
            dots: true,
            infinity: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,

                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        slidesToShow: 2,

                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,

                    }
                }
            ]
        }
    );
    const form = document.getElementById("form");
    form.addEventListener('submit', (e) =>
    {
        e.preventDefault();
        const { name, phone } = e.target;
        const reg = /^(\+7|8)[0-9]{12}$/g;
        if (!reg.test(phone.value))
        {
            phone.value = '';
            return;
        }
        console.log(`Send to back-end name=${ name.value } phone=${ phone.value }`);
    });

    addEventDisplayClueInputs('input_name');
    addEventDisplayClueInputs('input_tel');

    $("[id=action_down]").on("click", function (event) 
    {
        event.preventDefault();

        blockId = document.getElementById('form');
        blockOffset = $(blockId).offset().top;

        $("html, body").animate(
            {
                scrollTop: blockOffset
            },
            700
        );

    });
    const input_phone = document.getElementById('input_tel');
    input_phone.addEventListener('input', onlyDigit);
    const input_name = document.getElementById('input_name');
    input_name.addEventListener('input', onlyletter);

    const timerElement = document.getElementById('timer');
    const time = 30 * 60; // 30 minutes in seconds   

    startTimer(time, timerElement);
});
