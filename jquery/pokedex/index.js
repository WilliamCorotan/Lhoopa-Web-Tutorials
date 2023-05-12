$(function () {

    let searchInput = '';
    
    function badge(text){
        return `<span class="badge rounded-pill text-bg-dark me-2">${text}</span>`
    }
    
    function listItem(key, value){
        return `<li class="list-group-item col"><span>${key}: ${value}</span></li>`
    }
    
    function pokemonCard(name){
        return `
        <div class="p-1">
            <div class="card pokemon-card" data-pokemon-name="${name}">
                <div class="card-body">      
                    <h5 class="card-title">${name}</h5>
                </div>
            </div>
        </div>`
    }
    
    function fetchPokemons(url = 'https://pokeapi.co/api/v2/pokemon/'){
        $.ajax({
            url: url,
            dataType: "json",
            async: false
            })
            .done(function (data) {
                $('.pokemon-grid').children().remove() 

                data.results.forEach(result => {
                    $('.pokemon-grid').append(pokemonCard(result.name)) 
                })
                $('#back').attr('href', data.previous)
                $('#next').attr('href', data.next)

                
            });
    }
        
    fetchPokemons();
 
    /**
     * 
     * onclick of the document, finds the class
     * 
     * $(document).on(event, targetedHTMLElement, callbackFunction)
     * 
     */
    $(document).on('click', ".pokemon-card", function(){
        $.ajax({
            type: "GET",
            dataType: "json",
            url: `https://pokeapi.co/api/v2/pokemon/${$(this).attr('data-pokemon-name')}/`,
            beforeSend: function(){
                
                $('.card-img-top').attr('src', './no-image.png')
                $('.card-img-top').css({
                    height: '208px'
                })
                $('.card-img-top').addClass('placeholder')
                $('.search-card > .card-body').addClass('placeholder-glow')
                $(".search-card > .card-body > .card-title").addClass('placeholder d-block border rounded-pill')
                $(".search-card > .card-body > .badge").html('type')
                $(".search-card > .card-body > .badge").addClass('placeholder')
                $('.list-group').addClass('placeholder-glow')
                $('.list-group-item > span').addClass('placeholder border rounded-pill')
            }
        }).done(function (response) {
            $('.card-img-top').removeClass('placeholder')
            $('.search-card > .card-body').removeClass('placeholder-glow')
            $(".search-card > .card-body > .card-title").removeClass('placeholder d-block border rounded-pill')
            $(".search-card > .card-body > .badge").removeClass('placeholder')
            $('.list-group').removeClass('placeholder-glow')
            $('.list-group-item > span').removeClass('placeholder border rounded-pill')

            $('#error-message').remove();
            $(".search-card > .card-body > .card-title").html(response.name)
            
            $('.badge').remove();
            $('.list-group-item').remove();

            response.types.forEach(type => {        
                $('.search-card > .card-body').append(badge(type.type.name))
            });

            $('.card-img-top').attr('src', response.sprites.front_default);

            response.stats.forEach(stat => {
                $('.list-group').append(listItem(stat.stat.name, stat.base_stat))
            });

            $('.search-card').removeClass('d-none');

        }).fail(function(){
            const errorMessage = `<p id="error-message" class="display-5">Pokemon Not Found!</p>`
            $('.search-card').addClass('d-none');
            $('#error-message').remove();

            $('#title').after(errorMessage);
        })
      })

    $('#next').on('click', function(event){
        console.log(event.currentTarget)
        fetchPokemons($(this).attr('href'))
    })
    $('#back').on('click', function(event){
        console.log(event.currentTarget)
        fetchPokemons($(this).attr('href'))
    })

    $('#reset').on('click', function (){
        $('.search-card').addClass('d-none');    
    })



    $('#search-button').on('click',function() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: `https://pokeapi.co/api/v2/pokemon/${searchInput}/`,
        }).done(function (response) {
        console.log(response);

        $(".search-card > .card-title").html(response.name)
        
        $('.badge').remove();
        $('.list-group-item').remove();

        response.types.forEach(type => {        
            $('.search-card > .card-body').append(badge(type.type.name))
        });

        $('.card-img-top').attr('src', response.sprites.front_default);

        response.stats.forEach(stat => {
            $('.list-group').append(listItem(stat.stat.name, stat.base_stat))
        });

        $('.search-card').removeClass('d-none');

        }).fail(function(){
            const errorMessage = `<p class="display-5">Pokemon Not Found!</p>`
            $('.search-card').addClass('d-none');
            $('#title').after(errorMessage);
        })
    })

    $('#search').on('keyup',function() {
        if(!$(this).val()) return;
        searchInput = $(this).val();
        
        setTimeout(function(){

           
            $.ajax({
                type: "GET",
                dataType: "json",
                url: `https://pokeapi.co/api/v2/pokemon/${searchInput}/`,
            }).done(function (response) {
            console.log(response);
            $('#error-message').remove();
            $(".search-card > .card-title").html(response.name)
            
            $('.badge').remove();
            $('.list-group-item').remove();
    
            response.types.forEach(type => {        
                $('.search-card > .card-body').append(badge(type.type.name))
            });
    
            $('.card-img-top').attr('src', response.sprites.front_default);
    
            response.stats.forEach(stat => {
                $('.list-group').append(listItem(stat.stat.name, stat.base_stat))
            });
    
            $('.search-card').removeClass('d-none');
    
            }).fail(function(){
                const errorMessage = `<p id="error-message" class="display-5">Pokemon Not Found!</p>`
                $('.search-card').addClass('d-none');
                $('#error-message').remove();
    
                $('#title').after(errorMessage);
            })
        },800)
        
    })

    
});