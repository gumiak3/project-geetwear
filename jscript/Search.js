const searchInput = document.getElementById('szukaj');
searchInput.addEventListener('input',function(){
    
    const val = searchInput.value;
    console.log(val);
    if(val==""){
        document.getElementById("duzy_napis").innerHTML = "<h2 class='h1 title_of_product col-lg-12 '>Nie możesz znaleźć produktu?</h2>";
        document.getElementById("productsData").innerHTML = "";
    }else{
        document.getElementById("duzy_napis").innerHTML = "";
        $.ajax({
            url: "php/Search.php",
            method: 'POST',
            data: {
                val: val,
            }
        }).done(function( data ) {
            $('#productsData').html(data);
        })
    }
    
});