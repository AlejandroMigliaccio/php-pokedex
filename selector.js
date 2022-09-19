const apiKey= "Your api key"

$(document).ready(function () {
    $('#Articule').hide();

    if ($('#Pokelist').length > 0) {
        $('#Pokelist').on('change', function () {
            if ($('#Pokelist').val() == -1) {
                $('#Articule').hide();
            }
            else {
                $('#Articule').show();
            }
            $.ajax({
                url: $('#Pokelist').val(),
            }).done(function (data) {
                $('#Id').text('ID: ' + data.id);
                $('#Name').text('Name: ' + data.name);
                $('#ImageFront').attr('src', data.sprites.front_default);
                $('#ImageBack').attr('src', data.sprites.back_default);
                let idAb = 1;
                let abilitiesBloc = document.getElementById("Abilities"); 
                abilitiesBloc.innerHTML = ' ';                   
                $.each(data.abilities, (index, value) => {
                    abilitiesBloc.innerHTML += idAb + ' ' + value.ability.name + '<br>';
                    idAb++;
                })
                $.ajax({
                    url: urlGifGen(data.name,apiKey),
                }).done(function (data){
                    
                    const gifbox= document.getElementById("Pokegif");
                    gifbox.innerHTML= ' ';
                    $.each(data, (index, value)=>{//recorro la data
                        $.each(value, (index,value2)=>{ //recorro el array de la data
                            const imagif= value2.images.original.url;
                            const gif = document.createElement("img");
                            gif.classList.add("gifbox__img");
                            gif.src=imagif;
                            gifbox.appendChild(gif);
                        })
                        
                    })
                })
            });
        });
    }else{
        $('#Pokelist')
    }

    
});

const urlGifGen = (a,b) =>{
    return url=`https://api.giphy.com/v1/gifs/search?api_key=${b}&q=${a}&limit=3&offset=0&rating=g&lang=en`;
}
