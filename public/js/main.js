var log = console.log

var new_input_counter = 2
function gallery_input(input) {

    var new_input = input.cloneNode(true);

    input.setAttribute('readonly', true)
    input.style.display = 'none'

    // log(input.files)
    
    new_input.value = ''

    $(input).before($(new_input))

    for (var i = 0; i < input.files.length; i++) {
        log(input.files[i].name)
        var item = $('<div>'+input.files[i].name+'</div>')
        $(input).before(item)
    }

}
