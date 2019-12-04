
document.body.addEventListener('click', function(e){
    if(e.target.matches('a.light')){

        e.preventDefault();

        if(document.body.classList.contains('night')){
            document.body.classList.remove('night')
            document.cookie = "night=; max-age=-1; path=/;";
        } else {
            document.body.classList.add('night')
            document.cookie = "night=true; max-age=86400; path=/;";
        }
    }
})

if(document.cookie == 'night=true'){
    document.body.classList.add('night')
}
