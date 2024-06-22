<section>
    <div class="container2">
            <div class="cards">
                <? foreach($args as $card):
                     get_template_part( 'blocks/cards/card',null,$card );
                endforeach;?>
            </div>
    </div>

</section>